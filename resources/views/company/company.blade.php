@extends('layouts.main')
@section('content')
    <div class="container">
        <h2 >Companies</h2>
        <div class="row">
            @foreach($companies as $company)

            <div class="col-md-3 "style="margin-top: 100px;">
                <div class="card" style="width: 18rem;min-height: 240px; ">
                    @if (empty($company->cover_photo))
                        <img src="{{ asset('cover/tumblr-image-sizes-banner.png') }}" alt="banner" class="card-img-top"  style="width: 100%;">
                    @else
                        <img src="{{ asset('uploads/coverphoto') }}/{{ $company->cover_photo }}" alt="cover-photo"  class="card-img-top" style="width: 100%;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$company->cname}}</h5>
                        <center><a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="btn btn-primary">View Company</a></center>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br><br>
        {{$companies->links()}}

    </div>

@endsection
