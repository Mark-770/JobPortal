@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row" id="app">
          <div class="title" style="margin-top: 100px;">
                <h2 class="mt-4">{{ $post->title }}</h2>
              @if (Session::has('message'))
                  <div class="alert alert-success">
                      {{ Session::get('message') }}
                  </div>
              @endif
              @if (Session::has('err_message'))
                  <div class="alert alert-danger">
                      {{ Session::get('err_message') }}
                  </div>
              @endif
              @if (isset($error)&&count($error)>0)
                  <div class="alert alert-danger">
                     <ul>
                         @foreach($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                         @endforeach
                     </ul>
                  </div>
              @endif

          </div>
        <div class="col-md-12" >
            <img src="{{asset('storage/'.$post->image)}}" style="width: 100%;">
        </div>
          <div class="col-lg-8">
            <div class="p-4 mb-2 bg-white mt-3">
              <!-- icon-book mr-3-->
                <h5 class="h5 text-black mb-3"> Create By Admin: &nbsp;{{ date('d.m.Y',strtotime($post->created_at)) }}</h5>
              <p> {{ $post->text }}</p>

            </div>
          </div>

     </div>
   </div>
@endsection
