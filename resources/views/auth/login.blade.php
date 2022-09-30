@extends('dashboard.layouts.authentication')

@section('content')
<div class="col-lg-6">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input 
                            class="form-control @error('email') is-invalid @enderror" 
                            id="email" 
                            type="email" 
                            placeholder="name@example.com"
                            autofocus
                            name="email"
                            required
                            />

                        <label for="email">Email addresse</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input 
                            class="form-control @error('password') is-invalid @enderror" 
                            id="password" 
                            type="password"
                            placeholder="password"
                            autofocus
                            name="password"
                            required
                            />

                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">                            
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>                           
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        
                    </div>
                </form>
            </div>
        <div class="card-footer text-center py-3">
            <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
        </div>
    </div>
</div>
@endsection
