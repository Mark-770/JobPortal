@extends('layouts.app')

@section('content')

    <div class="container" >
        <div class="row" >
            <div class="col-md-4" >
                @include('admin.left-menu')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Menu
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title"> Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content"> Content</label>
                                <textarea name="text" class="form-control @error('text') is-invalid @enderror">{{ old('text') }}</textarea>
                                @error('text')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image"> Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status"> Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="1">Live</option>
                                    <option value="0">Draft</option>
                                </select>
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
