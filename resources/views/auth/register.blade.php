@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-header-title">{{ __('Register') }}</div>
    </div>

    <div class="card-content">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field">
                <label for="name" class="label">{{ __('Name') }}</label>
                <div class="control">
                    <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
                @error('name')
                    <p class="help is-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

            <div class="field">
                <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                <div class="control">
                    <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                    <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
