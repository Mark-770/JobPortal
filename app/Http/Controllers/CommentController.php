<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Job;
use Auth;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request,$id)
    {
        $jobId = $id;
        $user_id = auth()->user()->id;
        Comment::create([
            'user_id'=>$user_id,
            'job_id'=>$jobId,
            'comment'=>request('comment')
        ]);
        return redirect()->back()->with('message','Comment successfully');
    }

//    public function destroy(Request $request)
//    {
//        $id = $request->get('id');
//        $comment = Job::find($id);
//        $comment->delete();
//        return redirect()->back()->with('message','Comment successfully delete');
//    }
}
