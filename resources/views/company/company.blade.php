@extends('layouts.main')
@section('content')
    <div class="container">
        <h2 >Companies</h2>
        <div class="row d-flex flex-wrap">
            @foreach($companies as $company)

            <div class="col-lg-3 col-md-4 col-sm-6" style="margin-top: 100px;">
                <div class="card" style="height: 295px; ">
                    @if (empty($company->cover_photo))
                        <img src="{{ asset('cover/tumblr-image-sizes-banner.png') }}" alt="banner" class="card-img-top"  style="width: 100%;">
                    @else
                        <img src="{{ asset('uploads/coverphoto') }}/{{ $company->cover_photo }}" alt="cover-photo"  class="card-img-top" style="width: 100%;">
                    @endif
                    <div class="card-body d-flex flex-column  justify-content-center">
                        <h5 class="card-title text-center">{{$company->cname}}</h5>
                         <a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="btn btn-primary btn-company mt-auto">View Company</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br><br>
        {{$companies->links()}}

    </div>

@endsection


<style>
    .btn-company{
        display: block;
    }
</style>
