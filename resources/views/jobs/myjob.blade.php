@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 120px;">
            <div class="card mb-5">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>
                                    @if (empty(Auth::user()->company->logo))
                                        <img src="{{ asset('avatar/serwman1.jpg') }}" width="150"  alt="avatar"  class="mb-5" style="width: 50%" >
                                    @else
                                        <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" width="150"  alt="logo"  class="mb-5" style="width: 50%">
                                    @endif
                                </td>
                                <td >position:{{$job->position}}<br>
                                    <i class="fas fa-clock" aria-hidden="true"></i>&nbsp; {{$job->type}}
                                </td>

                                <td><i class="fas fa-map-marker" aria-hidden="true"></i>&nbsp;Address: {{$job->address}}</td>
                                <td><i class="fas fa-globe" aria-hidden="true"></i>&nbsp;Data:{{$job->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{ route('jobs.show',[$job->id , $job->slug]) }}">
                                        <button class="btn btn-success btn-sm">Apply</button>
                                    </a>
                                    <a href="{{ route('job.edit',[$job->id] )}}">
                                        <button class="btn btn-dark  mt-2">
                                            Edit
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
