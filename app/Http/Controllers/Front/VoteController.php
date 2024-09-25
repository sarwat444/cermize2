<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Panel\ResverationEloquent;

class VoteController extends Controller
{
    private $vote ;
    public function __construct(ResverationEloquent $VoteElequent)
    {
        $this->vote = $VoteElequent;
    }

    public function send_vote(Request $request)
    {
        $this->vote->store($request);
    }
    public function vote_statstics(Request $request) {

        return $this->vote->view_statistics($request);
    }
}
