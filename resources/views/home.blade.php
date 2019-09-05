@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-header-title">Dashboard</div>
    </div>

    <div class="card-content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        You are logged in!
        @admin
            You're also an admin!
        @endadmin
    </div>
</div>
@endsection
