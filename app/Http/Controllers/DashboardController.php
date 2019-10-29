<?php

namespace App\Http\Controllers;

use App\Post;
use App\Job;
use App\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('admin.index',compact('posts'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:3',
            'text'=>'required|min:3',
            'image'=>'required|mimes:jpeg,jpg,png'
        ]);
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::create([
                'title'=>$title=$request->get('title'),
                'slug'=>str_slug('title'),
                'text'=>$request->get('text'),
                'image'=>$path,
                'status'=>$request->get('status')
            ]);
        }
        return redirect('/dashboard')->with('message','Post created successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id);
//        dd($post->status);
        return view('admin.edit',compact('post'));
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
           'title'=>'required|min:3',
            'text'=>'required'
        ]);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::where('id',$id)->update([
                'title'=>$title=$request->get('title'),
                'text'=>$request->get('text'),
                'image'=>$path,
                'status'=>$request->get('status')
            ]);
        }
        $this->updateAllExceptImage($request,$id);
        return redirect()->back()->with('message','Post Update successfully');
    }

    public function updateAllExceptImage(Request $request,$id)
    {
        Post::where('id',$id)->update([
            'title'=>$title=$request->get('title'),
            'text'=>$request->get('text'),
            'status'=>$request->get('status')
        ]);
    }


    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('message','Post deleted successfully');
    }

    public function trash()
    {
        $posts =Post::onlyTrashed()->paginate(20);
        return view('admin.trash',compact('posts'));
    }

    public function restore($id)
    {
        Post::onlyTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('message','Post restored successfully');
    }

    public function toggle($id)
    {
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();
        return redirect()->back()->with('message','Status updated successfully');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.read',compact('post'));
    }

    public function getAllJobs()
    {
        $jobs = Job::latest()->paginate(20);
        return view('admin.job',compact('jobs'));
    }

    public function changeJobStatus($id)
    {
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();
        return redirect()->back()->with('message','Status updated successfully');
    }

}
