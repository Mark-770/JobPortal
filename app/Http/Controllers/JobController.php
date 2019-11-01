<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Http\Requests\JobPostRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Job;
use Auth;
use App\User;


class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer','verified'],['except'=>array('index','show','apply','allJobs','searchJob')]);
    }

    public function index()
    {
        $jobs = Job::latest()->limit(10)->get();
        $categories = Category::with('jobs')->get();
        $posts = Post::where('status',1)->get();
        $companies = Company::get()->random(12);
        return view('welcome', compact('jobs','companies','categories','posts'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function  show($id,Job $job)
    {
        $jobRecommendations = $this->jobRecommendations($job);

       return view('jobs.show', compact('job','jobRecommendations'));
    }

    public function jobRecommendations($job)
    {
        $data = [];

        $jobBasedOnCategories = Job::latest()
            ->where('category_id',$job->category_id)
            ->whereDate('last_date','>',date('Y-m-d'))
            ->where('id','!=',$job->id)
            ->where('status',1)
            ->limit(3)
            ->get();
        array_push($data,$jobBasedOnCategories);

        $jobBasedOnCompany = Job::latest()
            ->where('company_id',$job->company_id)
            ->whereDate('last_date','>',date('Y-m-d'))
            ->where('id','!=',$job->id)
            ->where('status',1)
            ->limit(3)
            ->get();
        array_push($data,$jobBasedOnCompany);

        $jobBasedOnPosition = Job::latest()
            ->where('position','LIKE','%'.$job->position.'%')
            ->whereDate('last_date','>',date('Y-m-d'))
            ->where('id','!=',$job->id)
            ->where('status',1)
            ->limit(3)
            ->get();
        array_push($data, $jobBasedOnPosition);


        $collection = collect($data);
        $unique = $collection->unique('id');
        $jobRecommendations = $unique->values()->first();
        return $jobRecommendations;
    }


    public function store(JobPostRequest $request)
    {

        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id'=>$user_id,
            'company_id'=>$company_id,
            'title'=>request('title'),
            'slug'=>str_slug(request('title')),
            'description'=>request('description'),
            'roles'=>request('roles'),
            'category_id'=>request('category_id'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date'),
            'number_of_vacancy'=>request('number_of_vacancy'),
            'experience'=>request('experience'),
            'gender'=>request('gender'),
            'salary'=>request('salary'),


        ]);
        return redirect()->back()->with('message','Job posted successfully');
    }

    public function myjob()
    {
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob', compact('jobs'));
    }
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required|min:3',
            'description'=>'required|min:7',
            'roles'=>'required',
            'address'=>'required|min:3',
            'position'=>'required',
            'last_date'=>'required',
            'number_of_vacancy'=>'required|numeric',
            'experience'=>'required|numeric'
        ]);


        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message','Job  successfully Updated!');
    }

    public function apply(Request $request,$id)
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Application sent!');
    }

    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
//        dd($applicants);
        return view('jobs.applicants',compact('applicants'));
    }

    public function allJobs(Request $request)
    {
        //front search
            $search = $request->get('search');
            $address = $request->get('address');
            if ($search && $address){
                $jobs = Job::where('position','LIKE','%'.$search.'%')
                    ->orWhere('type','LIKE','%'.$search.'%')
                    ->orWhere('title','LIKE','%'.$search.'%')
                    ->orWhere('address','LIKE','%'.$search.'%')
                    ->paginate(10);

                    return view('jobs.alljobs', compact('jobs'));

            }

        $keywords = $request->get('position');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');
        if ($keywords || $type || $category || $address) {
            $jobs = Job::where('position','LIKE','%'.$keywords.'%')
                ->orWhere('type',$type)
                ->orWhere('category_id',$category)
                ->orWhere('address',$address)
                ->paginate(10);
            return view('jobs.alljobs',compact('jobs'));
        } else{
            $jobs = Job::latest()->paginate(10);
        return view('jobs.alljobs', compact('jobs'));
        }
    }

    public function searchJob(Request $request)
    {
        $keyword = $request->get('keyword');
        $jobs = Job::where('title','like','%'.$keyword.'%')
        ->orWhere('position','like','%'.$keyword.'%')->limit(5)->get();

        return response()->json($jobs);
    }


}
