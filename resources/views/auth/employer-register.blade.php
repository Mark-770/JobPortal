@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <h1 style="margin-top: 50px;">Employer Registration</h1>


                <div class="site-section bg-light">
                    <div class="container">
                        <div class="row">
                <div class="col-md-12 col-lg-8 mb-5">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('emp.register') }}" class="p-5 bg-white">
                        @csrf

                        <input type="hidden" value="employer" name="user_type">

                        <div class="form-group row">
                            <label for="cname" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Company name') }}</label>

                            <div class="col-md-6">
                                <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('cname') }}" required autocomplete="cname" autofocus>

                                @error('cname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Employer Register') }}
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
