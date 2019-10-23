@extends('layouts.app')

@section('content')
<h1 class="title">Vehículos</h1>
<a href="{{ route('vehiculos.create') }}" class="button is-primary">añadir vehículo</a>
<div class="box">
    <table class="table is-bordered is-striped is-narrow is-fullwidth">
        <thead>
            <tr>
                <th>nombre</th>
                <th>última actualización</th>
                <th>última posición</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devices as $device)
                <tr>
                    <td><a href="{{ route('vehiculos.show', $device) }}">{{ $device->name }}</a></td>
                    <td>{{ $device->lastupdate }}</td>
                    <td>{{ $device->lastPosition() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
