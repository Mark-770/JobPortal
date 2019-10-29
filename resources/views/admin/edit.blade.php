@extends('layouts.app')

@section('content')

    <div class="container" >
        <div class="row" >

            <div class="col-md-4" >
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @include('admin.left-menu')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit post
                    </div>
                    <div class="card-body">
                        <form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title"> Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content"> Content</label>
                                <textarea name="text" class="form-control @error('text') is-invalid @enderror">{{$post->text}}</textarea>
                                @error('text')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image"> Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                <img src="{{ asset('storage/'.$post->image) }}" style="width: 50%;" alt="img" class="mt-2">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status"> Status</label>
                                <select name="status" class="form-control">
                                    <option value="0"{{$post->status=='0'?'selected':''}}>Draft</option>
                                    <option value="1"{{$post->status=='1'?'selected':''}}>Live</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
