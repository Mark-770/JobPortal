@extends('layouts.app')

@section('content')

    <div class="container" >
        <div class="row" >

            <div class="col-md-4" >
                @include('admin.left-menu')
            </div>
            <div class="col-md-8">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Menu
                    </div>
                    <div class="card-body">
                        <form action="{{route('testimonial.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="content"> Content</label>
                                <input type="text" name="content" class="form-control @error('title') is-invalid @enderror" value="{{ old('content') }}">
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="profession">Profession</label>
                                <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror" value="{{ old('profession') }}">
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="video_id">Video_id</label>
                                <input type="text" name="video_id" class="form-control @error('video_id') is-invalid @enderror" value="{{ old('video_id') }}">
                                @error('video_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
