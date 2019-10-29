
@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row" >
            <h2 style="margin-top: 150px;">{{$categoryName->name}}</h2>
            <table class="table" >
                <tbody>
                @if (count($jobs)>0)
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
                                <button class="btn btn-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    @else
                    <td>
                        No jobs found
                    </td>
                    @endif
                </tbody>
            </table>
            {{ $jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
        </div>

    </div>

@endsection

<style>
    .fas{
        color:#4183D7;
    }
</style>
