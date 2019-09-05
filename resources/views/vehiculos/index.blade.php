@extends('layouts.app')

@section('content')
<h1> Hello, homie</h1>
<ul>
    @foreach ($equipos as $equipo)
        <li>{{ $equipo->equipo }}</li>
    @endforeach
</ul>
@endsection
