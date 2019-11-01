@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container" id="app">
       <div class="row" id="app">
          <div class="title" style="margin-top: 100px;">
                <h2 class="mt-4">{{$job->title}}</h2>
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
            <img src="{{asset('office1.jpg')}}" style="width: 100%;">
        </div>
          <div class="col-lg-8">


            <div class="p-4 mb-2 bg-white mt-3">
              <!-- icon-book mr-3-->
              <h3 class="h5 text-black mb-3">
                  <i class="fas fa-book" style="color: blue;">&nbsp;
                  </i>Description <a href="#"data-toggle="modal" data-target="#exampleModal1">
                      <i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a></h3>
              <p> {{$job->description}}</p>

            </div>
            <div class="p-2 mb-2 bg-white">
              <!--icon-align-left mr-3-->
              <h3 class="h5 text-black mb-3"><i class="fas fa-user" style="color: blue;">&nbsp;</i>Roles and Responsibilities</h3>
              <p>{{$job->roles}}</p>

            </div>
            <div class="p-2 mb-2 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fas fa-users" style="color: blue;">&nbsp;</i>Number of vacancy</h3>
              <p>{{$job->number_of_vacancy}}</p>

            </div>
            <div class="p-2 mb-2 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fas fa-clock" style="color: blue;">&nbsp;</i>Experience</h3>
              <p>{{$job->experience}}</p>

            </div>
            <div class="p-2 mb-2 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fas fa-venus-mars" style="color: blue;">&nbsp;</i>Gender</h3>
              <p>{{$job->gender}}</p>

            </div>
            <div class="p-2 mb-2 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fas fa-money-check" style="color: blue;">&nbsp;</i>Salary</h3>
              <p>{{$job->salary}}</p>
            </div>

          </div>


            <div class="col-md-4 mt-4 p-4 site-section bg-light">
              <h3 class="h5 text-black mb-3 text-center">Short Info</h3>
                <p>Company name: {{ $job->company->cname }}</p>
                <p>Address: {{ $job->address }}</p>
                <p>Employment Type: {{ $job->type }}</p>
                <p>Position: {{ $job->position }}</p>
                <p>Date: {{ $job->created_at->diffForHumans() }}</p>
                <p>Last date to apply {{ date('F d,Y',strtotime($job->last_date)) }}</p>



              <p><a href="{{ route('company.index', [$job->company->id, $job->company->slug]) }}" class="btn btn-warning" style="width: 100%;">Visit Company Page</a></p>
              <p>
                  @if(Auth::check()&&Auth::user()->user_type ==='seeker')
                      @if (!$job->checkApplication())
                          <apply-component :jobid="{{ $job->id }}"></apply-component>
                      @endif
                      <favorite-component :jobid="{{ $job->id }}" :favorited="{{ $job->checkSaved()?'true':'false' }}"></favorite-component>
                  @endif
              </p>
            </div>
            </div>

         @if(Auth::check())
         <div class="row">
             <div class="col-md-6">
                 <form action="{{ route('comment.store',[$job->id]) }}" method="POST">
                     @csrf
                 <div class="card mt-5">
                     <div class="card-header">
                         Comments
                     </div>
                     <div class="card-body">
                         <div>
                             @foreach ($job->comments as $comment)
{{--                                 @foreach($job->users as $user)--}}
                            <p>
                                {{ $comment->comment }}
                            </p>
{{--                                     @endforeach--}}
                             @endforeach
                         </div>
                     </div>
                     <div class="card-footer">
                         <label for="comment"></label>
                         <textarea name="comment" placeholder="Write you comment here" class="form-control @error('comment') is-invalid @enderror"  id="" cols="10" rows="3"></textarea>
                         @error('comment')
                         <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                         @enderror
                         <div class="form-group ">
                             <button type="submit" class="btn btn-primary  mt-2" style="color: #ffffff;">Send Message</button>
                         </div>

                     </div>
                 </div>
                 </form>
             </div>
         </div>
         @endif
           <div class="row">
               <div class="col-md-12">
                   <div class="rec_job d-flex  mt-5 ">
                       @foreach ($jobRecommendations as $jobRecommendation)
                           <div class="card d-flex mr-2 justify-content-center" style="width: 18rem;">
                               <div class="card-body  text-center">
                                   <p class="badge badge-success">{{$jobRecommendation->type}}</p>
                                   <h5 class="card-title">{{$jobRecommendation->position}}</h5>
                                   <p class="card-text">{{str_limit($jobRecommendation->description,80)}}
                                   <div >
                                       <a href="{{route('jobs.show',[$jobRecommendation->id,$jobRecommendation->slug])}}" class="btn btn-success justify-content-end">Apply</a>
                                   </div>


                               </div>
                           </div>
                       @endforeach
                   </div>
               </div>
           </div>




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
      <form action="{{route('mail')}}" method="POST">
          @csrf
      <div class="modal-body">
        <input type="hidden" name="job_id" value="{{$job->id}}">
        <input type="hidden" name="job_slug" value="{{$job->slug}}">

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
           <!-- End Modal -->




<br>
<br>
<br>

     </div>
   </div>
@endsection
