@extends('layouts.app')

@section('content')
<h1 class="title">Vehículos</h1>
<table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
        <tr>
            <th>id</th>
            <th>equipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($devices as $device)
            <tr>
                <td><a href="{{ route('vehiculos.show', ['device' => $device]) }}">{{ $device->id }}</a></td>
                <td>{{ $device->detail }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
