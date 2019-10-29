@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="company-profile">
            @if (empty($company->cover_photo))
            <img src="{{ asset('cover/tumblr-image-sizes-banner.png') }}" alt="banner"  style="width: 100%;">
            @else
                <img src="{{ asset('uploads/coverphoto') }}/{{ $company->cover_photo }}" alt="cover-photo" style="width: 50%;">
            @endif
            <div class="company-desc mt-3">
                @if (empty($company->logo))
                    <img src="{{ asset('avatar/serwman1.jpg') }}" width="150"  alt="avatar"  class="mb-5" >
                @else
                    <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" width="150"  alt="logo"  class="mb-5">
                @endif
                <p>{{$company->description}}</p>
                <h1>{{$company->cname}}</h1>
                <p>
                    <strong>
                        Slogan-&nbsp;
                    </strong>
                        {{ $company->slogan }}
                    <strong>
                        Address-&nbsp;
                    </strong>
                        {{ $company->address }}

                    <strong>
                    Phone-&nbsp;
                    </strong>
                        {{$company->phone}}
                    <strong>
                        Website-&nbsp;
                    </strong>
                    <a href="#">{{ $company->website }}</a>
                </p>

            </div>
        </div>
            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($company->jobs as $job)
                    <tr>
                        <td><img src="{{ asset('avatar/serwman1.jpg') }}" width="80" alt="avatar"></td>
                        <td >position:{{$job->position}}<br>
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
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
