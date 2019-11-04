@extends('layouts.main')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <h1 class="mt-5">Seeker Registration</h1>

                <div class="site-section bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-8 mb-5">
                                <form method="POST" action="{{ route('register') }}" class="p-5 bg-white">
                                    @csrf

                                    <input type="hidden" value="seeker" name="user_type">

                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dob"
                                               class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Date of Birth') }}</label>

                                        <div class="col-md-6">
                                            <input id="dob" type="date"
                                                   class="form-control @error('dob') is-invalid @enderror" name="dob"
                                                   value="{{ old('dob') }}" required>

                                            @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                               class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender"
                                               class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Gender') }}</label>

                                        <div class="col-md-6">
                                            <input type="radio" name="gender" value="male" class="mr-2" required>Male
                                            <input type="radio" name="gender" value="female" class="mr-2" required>Female

                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 offset-md-4">
                                            <button type="submit" class="btn btn-primary pill px-4 py-2">
                                                {{ __('Register Seeker') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-4">
                                <div class="p-4 mb-3 bg-white">
                                    <h3 class="h5 text-black mb-3">More Info</h3>
                                    <p>Once you create an account a verification link will be sent to your email</p>
                                    <p><a href="#" class="btn btn-primary px-4 py-2 text-white pill">Learn More</a></p>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
