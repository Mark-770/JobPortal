@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <search-component></search-component>
            </div>
            <h1>Recent Jobs</h1>
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
                        <td><img src="{{ asset('uploads/logo') }}/{{$job->company->logo}}" width="80" alt="avatar"></td>
                        <td>position: {{$job->position}}<br><br>
                            <i class="fas fa-clock" aria-hidden="true"></i>&nbsp; {{$job->type}}
                        </td>

                        <td><i class="fas fa-map-marker" aria-hidden="true"></i>&nbsp;Address: {{$job->address}}</td>
                        <td><i class="fas fa-globe" aria-hidden="true"></i>&nbsp;Data:{{$job->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{ route('jobs.show',[$job->id , $job->slug]) }}">
                                <button class="btn btn-outline-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <a href="{{ route('alljobs') }}">
                <button class="btn btn-success btn-lg mt-2 mb-3" style="width: 100%">Browse all jobs</button>
            </a>

        </div>

        <h1 class="mb-3">Featured Companies</h1>
    </div>
    <div class="container">
        <div class="row">
            @foreach($companies as $company)
            <div class="col-md-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('uploads/logo') }}/{{$company->logo}}" width="80" alt="avatar" class="ml-3 mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{str_limit($company->cname,25)}}</h5>
                        <p class="card-text">{{str_limit($company->description,25)}}</p>
                        <a href="{{ route('company.index',[$company->id,$company->slug]) }}" class="btn btn-primary">Visit company</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection

<style>
    .fas{
        color:#4183D7;
    }
</style>
