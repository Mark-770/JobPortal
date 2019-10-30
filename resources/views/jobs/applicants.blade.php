@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top: 120px">
            <div class="card mb-5">
            @foreach($applicants as $applicant)
                    <div class="card-header"><a href="{{ route('jobs.show',[$applicant->id , $applicant->slug]) }}">{{ $applicant->title }}</a></div>

                <div class="card-body">
                    @foreach($applicant->users as $user)
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="name"><strong>Name:</strong><br> {{$user->name}}</td>
                            <td class="email"><strong>Email:</strong> <br>{{$user->email}}</td>
                            <td><strong>Gender:</strong><br>{{ $user->profile->address }}</td>
                            <td><strong>Bio:</strong> <br>{{ $user->profile->bio }}</td>
                            <td><strong>Exp:</strong> <br>{{ $user->profile->experience }}</td>
                            <td><a href="{{Storage::url($user->profile->resume)}}" target="_blank">Resume</a></td>
                            <td><a href="{{ Storage::url($user->profile->cover_letter) }}">Cover letter</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
            @endforeach

            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .name{
        min-width: 200px;
        margin-left: 20px;
    }
    .email{
        min-width: 250px;
    }

</style>
