@extends('layouts.app')

@section('content')
<h1 class="title">Información sobre el Equipo</h1>
<div class="box">
    <table class="table is-bordered is-striped is-narrow is-fullwidth">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>última Actualización</th>
                <th>Teléfono</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Serial</th>
                <th>Arreglo</th>
                <th>Placa</th>
                <th>Usuarios</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $device->id }}</td>
                <td>{{ $device->name }}</td>
                <td>{{ $device->lastupdate }}</td>
                <td>{{ $device->phone }}</td>
                <td>{{ $device->model }}</td>
                <td>{{ $device->detail->marca }}</td>
                <td>{{ $device->detail->serial }}</td>
                <td>{{ $device->detail->arreglo }}</td>
                <td>{{ $device->detail->placa }}</td>
                <td>{{ $device->users }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
