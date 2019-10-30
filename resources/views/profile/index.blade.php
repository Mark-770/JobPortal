@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 150px;">

        </div>
        <div class="col-md-3">
            @if (empty(Auth::user()->profile->avatar))
                <img src="{{ asset('avatar/serwman1.jpg') }}" alt="avatar" width="100px;" class="mb-5" style="width: 100%;">
            @else
                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" alt="avatar" width="100px;" class="mb-5" style="width: 100%;">
            @endif
            <form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Update avatar</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="avatar">
                        <button class="btn btn-success mt-3 float-right" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Update Your Profile
                </div>
                <form action="{{ route('profile.create') }}" method="POST">
                    @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ Auth::user()->profile->address }}" >
                    </div>
                    <div class="form-group">
                        <label for="">Experience</label>
                        <textarea name="experience" id="" cols="20" rows="3" class="form-control">{{ Auth::user()->profile->experience }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Bio</label>
                        <textarea name="bio" id="" cols="20" rows="3" class="form-control">{{ Auth::user()->profile->bio }}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            </form>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Your Information
                </div>
                <div class="card-body">
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>Address: {{ Auth::user()->profile->address }}</p>
                    <p>Gender: {{ Auth::user()->profile->gender }}</p>
                    <p>Experience: {{ Auth::user()->profile->experience }}</p>
                    <p>Bio: {{ Auth::user()->profile->bio }}</p>
                    <p>Member On: {{ date('F d Y',strtotime(Auth::user()->created_at))}}</p>
                </div>
            </div>
            <form action="{{ route('cover.letter') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Update coverletter
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_letter">
                        <button class="btn btn-success mt-3 float-right" type="submit">Update</button>
                    </div>
                </div>
            </form>
            <form action="{{ route('resume') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-5">
                    <div class="card-header">Update resume</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="resume">
                        <button class="btn btn-success mt-3 float-right" type="submit">Update</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
