<?php

namespace App\Repositories\Panel;

use App\Models\Answer;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Order;
use App\Models\Question;
use App\Repositories\Panel\Exception;
use DataTables;
use Illuminate\Support\Facades\DB;

class QuestionEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $questions = Question::select('*')
            ->with([
                'user:id,first_name,last_name',
                'category',
            ])
            ->whereNotNull('category_id')
            ->get();
        return DataTables::of($questions)
            ->addIndexColumn()
            ->addColumn('user', function ($question) {
                return $question->user->first_name . ' ' . $question->user->last_name;
            })->addColumn('category', function ($question) {
                return $question->category?->name;
            })->addColumn('details', function ($question) {
                return $question->details;
            })->addColumn('created at', function ($question) {
                return date('d.m.y H:i', strtotime($question->created_at));
            })->addColumn('action', function ($question) {
                return view('panel.questions.partials.actions', compact('question'))->render();
            })->rawColumns(['action'])
            ->make(true);
    }

    public function show($id) {
        return Question::with(['categories'])->findOrFail($id);
    }

    public function create(): array
    {
        $data['categories'] = Category::where('active',1)->get();
        return $data;
    }
    public function store($request) {
        DB::beginTransaction();
        try {
            $data            = $request->all();
            $data['is_public'] = isset($data['is_public']) ? 1 : 0;
            $data['is_answer'] = isset($data['is_answer']) ? 1 : 0;
            $data['is_private'] = isset($data['is_private']) ? 1 : 0;
            $data['user_id'] = $this->getUser(true)->id;
            $detailsArray = [];
            $detailsArray["details_en"] = $data['en'];
            $detailsArray["details_ar"] = $data['ar'];
            $detailsArray["details_fr"] = $data['fr'];
            $request->request->add($detailsArray);
            $question = Question::updateOrCreate(['id' => 0], $data)->createTranslation($request);

            if($data['answerEnDetails'] || $data['answerArDetails'] || $data['answerFrDetails']){
                $answerData = [
                    'question_id' => $question->id,
                    'details_en' => $data['answerEnDetails'],
                    'details_ar' => $data['answerArDetails'],
                    'details_fr' => $data['answerFrDetails'],
                ];
                $request->request->add($answerData);
                Answer::Create(['question_id' => $question->id], $answerData)->createTranslation($request);
            }
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch(Exception $e) {
            $message = __('message_error');
            $status = false;
            DB::rollback();
        }
        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }

    public function edit($id)
    {
        $data['categories'] = Category::where('active',1)->get();
        $data['item'] = Question::where('id', $id)->with(['answers'])->first();
        if ($data['item'] == '') {
            abort(404);
        }
        return $data;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['is_public'] = isset($data['is_public']) ? 1 : 0;
            $data['is_answer'] = isset($data['is_answer']) ? 1 : 0;
            $data['is_private'] = isset($data['is_private']) ? 1 : 0;
            $detailsArray = [];
            $detailsArray["details_en"] = $data['en'];
            $detailsArray["details_ar"] = $data['ar'];
            $detailsArray["details_fr"] = $data['fr'];
            $request->request->add($detailsArray);
            $question = Question::updateOrCreate(['id' => $id], $data)->createTranslation($request);

            $answerData = [
                'question_id' => $question->id,
                'answer_id' => $data['answer_id'] ?? null,
                'details_en' => $data['answerEnDetails'],
                'details_ar' => $data['answerArDetails'],
                'details_fr' => $data['answerFrDetails'],
            ];
            $request->request->add($answerData);
            Answer::updateOrCreate(['question_id' => $question->id], $answerData)->createTranslation($request);
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch (\Exception $e) {
            $message = $e->getMessage();
            $status = false;
            DB::rollback();
        }

        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }
    public function delete($id)
    {
        $question = Question::find($id);
        $question->delete();

        $response = [
            'message' => __('message_done'),
            'status' => true,
        ];
        return $response;
    }

}
