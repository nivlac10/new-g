@extends('layouts.app')

@section('content')
<main class="login-padding">
    <div class="left-section">
    </div>
    <div class="right-section" style="display: flex; flex-direction: column; justify-content: center;">
        <img src="{{ asset('img/jc-logo.png') }}" style="width:50px; height:50px; margin-top:10px; margin-bottom:10px;">
        <h4 style="padding:5px; margin-bottom:5px; font-weight:bold;">Welcome to JobCraft</h4>
        <p style="padding:5px; color:#979FA5; margin-bottom:35px;">Please enter your registration email and password.</p>
        
        <div class="card" style=" border:none !important;">
            <div class="card-body login-card" style="background-color:white; border:none !important;">
            @if (session('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif
            @if(session('account_not_approved'))
                <div class="alert alert-danger" role="alert">
                    {{ session('account_not_approved') }}
                </div>
            @endif
            
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="col-form-label" style="font-weight:bold;">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        
                    </div>

                    <div class="mb-3">
                        <label for="password" class="col-form-label" style="font-weight:bold;">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('email') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember User ID') }}
                            </label>
                        </div>
                    </div>

                    <div class="mb-0">
                        <button type="submit" class="btn btn-primary" style="width:100% !important; background-color:#00AF68 !important; border:#00AF68; font-size:18px;">
                            {{ __('Login') }}
                        </button>

                        
                    </div>
                </form>
                <div class="footer-text">
                    <p>By applying, you agree to the JobCraft Terms of Service and to occasionally receive email from us. Please read our Privacy Policy to learn how we use your personal data.</p>
            </div>
            </div>
            
        </div>
        
        <!--
        <div class="separator" style="text-align: center; margin-top: 20px;">
            <a href="/register">Register an account</a>
            <span>|</span>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        -->
        
    </div>
    
</main>
@endsection
