@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">

       <div class="row" id="app">
          <div class="title" style="margin-top: 100px;">
                <h2 class="mt-4">{{$company->cname}}</h2>

          </div>
        <div class="col-md-12 mt-4" >
            @if (empty($company->cover_photo))
                <img src="{{ asset('cover/tumblr-image-sizes-banner.png') }}" alt="banner"  style="width: 100%;">
            @else
                <img src="{{ asset('uploads/coverphoto') }}/{{ $company->cover_photo }}" alt="cover-photo" style="width: 100%;">
            @endif
        </div>
          <div class="col-lg-12">


            <div class="p-4 col-lg-12 bg-white">
              <!-- icon-book mr-3-->
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
                <table class="table">

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

{{--<div class="card" style="width: 18rem;">--}}
{{--  <div class="card-body">--}}
{{--    <p class="badge badge-success">1</p>--}}
{{--    <h5 class="card-title">1</h5>--}}
{{--    <p class="card-text">1--}}
{{--   <center> <a href="#" class="btn btn-success">Apply</a></center>--}}
{{--  </div>--}}
{{--</div>--}}


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send job to your friend</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="POST">@csrf

      <div class="modal-body">
        <input type="hidden" name="job_id" value="1">
        <input type="hidden" name="job_slug" value="1">

        <div class="form-goup">
          <label>Your name * </label>
          <input type="text" name="your_name" class="form-control" required="">
        </div>
        <div class="form-goup">
          <label>Your email *</label>
          <input type="email" name="your_email" class="form-control" required="">
        </div>
        <div class="form-goup">
          <label>Person name *</label>
          <input type="text" name="friend_name" class="form-control" required="">
        </div>
        <div class="form-goup">
          <label>Person email *</label>
          <input type="email" name="friend_email" class="form-control" required="">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Mail this job</button>
      </div>
    </form>
    </div>
  </div>
</div>
               </div>


<br>
<br>
<br>

     </div>
   </div>
@endsection
