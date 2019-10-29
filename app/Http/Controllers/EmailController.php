<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Mail;
use App\Mail\SendJob;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request,[
            'your_name'=>'required|string',
            'your_email'=>'required|email',
            'friend_name'=>'required|string',
            'friend_email'=>'required|email'
        ]);

        $homeUrl = url('/');
        $jobId = $request->get('job_id');
        $jobSlug = $request->get('job_slug');

        $jobUrl = $homeUrl.'/'.'jobs/'.$jobId.'/'.$jobSlug;

        $date = array(
            'your_name'=>$request->get('your_name'),
            'your_email'=>$request->get('your_email'),
            'friend_name'=>$request->get('friend_name'),
            'jobUrl'=>$jobUrl
        );
    try{
        $emailTo = $request->get('friend_email');
        Mail::to($emailTo)->send(new SendJob($date));
        return redirect()->back()->with('message','Job sent to '.$emailTo);
    }catch (\Exception $e){
        return redirect()->back()->with('err_message','Sorry.Something went wrong.Pls try later');
    }



    }
}
