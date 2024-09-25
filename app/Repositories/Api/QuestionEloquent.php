<?php

namespace App\Repositories\Api;

use App\Http\Resources\Api\QuestionsResource;
use App\Models\Question;
use App\Models\User;
use App\Traits\ResponseJson;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionEloquent extends HelperEloquent
{
   use ResponseJson;

    public function allQuestions() {
        return  QuestionsResource::collection(Question::with('category')->whereNotNull('category_id')->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
       // return $this->sendResponse(__('done_success') , $questions);
    }

    public function allpublicQuestions() {
        return  QuestionsResource::collection(Question::whereNull('category_id')->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
    }

    public function categoryUserQuestions($category_id) {
        $user_id    = @$this->getUser(true)->id;
        return  QuestionsResource::collection(Question::with('category')->where(['user_id' =>  $user_id , 'category_id' => $category_id])->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
    }

    public function categoryQuestions($category_id) {
        return  QuestionsResource::collection(Question::where('category_id' , $category_id)->with('category')->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
    }
    public function myQuestions($type) {
        $user_id    = @$this->getUser(true)->id;
        if($type == 'all') {
            return  QuestionsResource::collection(Question::with('category')->whereNotNull('category_id')->where('user_id' , $user_id)->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
        }else {
            return  QuestionsResource::collection(Question::whereNull('category_id')->where('user_id' , $user_id)->orderBy('id' , 'DESC')->paginate(config('constants.PAGIBNATION_COUNT')));
        }
       // return $this->sendResponse(__('done_success') , $questions);
    }

    public function show($id) {
        return  QuestionsResource::collection(Question::with(['category', 'answers:id,question_id'])
        ->where(['id' => $id])
        ->get()
        )->first();
    }
   public function store($request) {
        DB::beginTransaction();
        try {
            $data            = $request->all();
            $data['user_id'] = $this->getUser(true)->id;
            $detailsArray = [];
            foreach(locales() as $key=>$locale) {
                $detailsArray["details_$key"] = $data['details'];
            }
            $request->request->add($detailsArray);
            $question        = Question::updateOrCreate(['id' => 0], $data)->createTranslation($request);
            DB::commit();
            return $this->sendResponse(__('done_success') , null);
        }catch(Exception $e) {
            DB::rollback();
            return $this->sendError( __('something_wrong_happen') , null);
        }
   }

   public function update($id , $request) {
        DB::beginTransaction();
        try {
            $data            = $request->all();
            $user_id         = $this->getUser(true)->id;
            $question        = Question::where(['id' => $id , 'user_id' => $user_id])->first();
            if($question) {
                $detailsArray    = [];
                foreach(locales() as $key=>$locale) {
                    $detailsArray["details_$key"] = $data['details'];
                }
                $request->request->add($detailsArray);
                $question        = Question::updateOrCreate(['id' => $id], $data)->createTranslation($request);
                DB::commit();
                return $this->sendResponse(__('done_success') , null);
            }else {
                return $this->sendError( __('not_found') , null);
            }
        }catch(Exception $e) {
            DB::rollback();
            return $this->sendError( __('something_wrong_happen') , null);
        }
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            $user_id         = $this->getUser(true)->id;
            $question        = Question::where(['id' => $id , 'user_id' => $user_id])->first();
            if($question) {
                $question->forceDelete();
                DB::commit();
                return $this->sendResponse(__('done_success') , null);
            }else {
                return $this->sendError( __('not_found') , null);
            }
        }catch(Exception $e) {
            DB::rollback();
            return $this->sendError( __('something_wrong_happen') , null);
        }
    }
}
