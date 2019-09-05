@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-header-title">{{ __('Reset Password') }}</div>
    </div>

    <div class="card-content">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="field">
                <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                <div class="control">
                    <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                    <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="new-password">
                </div>
                @error('password')
                    <p class="help is-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

            <div class="field">
                <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

                <div class="control">
                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
