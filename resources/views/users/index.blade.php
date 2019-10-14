@extends('layouts.app')

@section('content')
<h1 class="title">Usuarios</h1>
<table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
