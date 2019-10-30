@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 150px;">
            <div class="card mb-5">
                <div class="card-header">Update a job</div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('job.update',[$job->id]) }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $job->title }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control @error('title') is-invalid @enderror"  id="" cols="10" rows="3">{{ $job->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <textarea name="roles" class="form-control @error('roles') is-invalid @enderror"  id="" cols="10" rows="2">{{  $job->roles }}</textarea>
                        @error('roles')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category_id" class="form-control" id="">
                            @foreach(App\Category::all() as $cat)
                                <option value="{{ $cat->id }}"{{ $job->category_id===$cat->id ? 'selected':''}}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ $job->position }}">
                        @error('position')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$job->address }}">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <div class="form-group">
                            <label for="number_of_vacancy">Number of vacancy:</label>
                            <input type="text" name="number_of_vacancy" class="form-control @error('number_of_vacancy') is-invalid @enderror" value="{{ $job->number_of_vacancy }}">
                            @error('number_of_vacancy')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="experience">Experience:</label>
                            <input type="text" name="experience" class="form-control @error('experience') is-invalid @enderror" value="{{ $job->experience }}">
                            @error('experience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="salary">Salary/year:</label>
                            <select class="form-control" name="salary">
                                <option value="negotiable">-select-</option>
                                <option value="2000-5000"{{ $job->salary==='2000-5000'?'selected':'' }}>2000-5000</option>
                                <option value="50000-10000"{{ $job->salary==='50000-10000'?'selected':'' }}>50000-10000</option>
                                <option value="10000-20000"{{ $job->salary==='10000-20000'?'selected':'' }}>10000-20000</option>
                                <option value="30000-500000"{{ $job->salary==='30000-500000'?'selected':'' }}>30000-500000</option>
                                <option value="500000-600000"{{ $job->salary==='500000-600000'?'selected':'' }}>500000-600000</option>
                                <option value="600000 plus"{{ $job->salary==='600000 plus'?'selected':'' }}>600000 plus</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select class="form-control" name="gender">
                                <option value="any"{{ $job->gender==='any'?'selected':'' }}>Any</option>
                                <option value="male"{{ $job->gender==='male'?'selected':'' }}>male</option>
                                <option value="casual"{{ $job->gender==='female'?'selected':'' }}>female</option>
                            </select>

                        </div>

                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select name="type" id="" class="form-control">
                            <option value="fulltime"{{ $job->type==='fulltime'?'selected':'' }}>fulltime</option>
                            <option value="parttime"{{ $job->type==='parttime'?'selected':'' }}>parttime</option>
                            <option value="casual"{{ $job->type==='casual'?'selected':'' }}>casual</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="" class="form-control">
                            <option value="1"{{ $job->status===1 ? 'selected':'' }}>live</option>
                            <option value="0"{{ $job->status===0 ? 'selected':'' }}>draft</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lastdate">Last date:</label>
                        <input type="date" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{$job->last_date }}">
                        @error('last_date')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
