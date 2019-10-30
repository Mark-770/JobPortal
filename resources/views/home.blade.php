@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10" style="margin-top: 150px;">

            @if (Auth::user()->user_type==='seeker')
                <h2>Saved Jobs</h2>
            @foreach($jobs as $job)
            <div class="card">
                <div class="card-header">{{ $job->title }}</div>
                <small class="badge badge-primary mt-1" style="width: 25%"> {{ $job->position }}</small>

                <div class="card-body">
                    {{ $job->description }}
                </div>
                <div class="card-footer">
                    <span><a href="{{ route('jobs.show',[$job->id , $job->slug]) }}">Read</a></span>
                    <span class="float-right">Last date apply: {{ date('F d,Y',strtotime($job->last_date))}}</span>
                </div>
            </div>
                <br>
            @endforeach
                @else
                <h2 class="mb-5">You are logged in as
                @if(Auth::user()->user_type==='employer')
                    {{Auth::user()->company->cname}}
                @else
                    {{Auth::user()->name}}
                @endif
            @endif
                </h2>
        </div>
    </div>
</div>
@endsection
