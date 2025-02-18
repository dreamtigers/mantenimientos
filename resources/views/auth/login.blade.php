@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-header-title">{{ __('Login') }}</div>
    </div>

    <div class="card-content">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                <div class="control">
                    <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                @error('email')
                    <p class="help is-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

            <div class="field">
                <label for="password" class="label">{{ __('Password') }}</label>
                <div class="control">
                    <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
                </div>
                @error('password')
                    <p class="help is-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

            <div class="field">
                <div class="control">
                    <label class="checkbox" for="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="button is-text" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
