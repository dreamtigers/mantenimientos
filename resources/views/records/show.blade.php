@extends('layouts.app')

@section('content')
<h1 class="title">Detalles del Registro</h1>
<div class="box">
    <table class="table is-bordered is-striped is-narrow is-fullwidth">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>fecha</th>
                <th>horas motor a la fecha</th>
                <th>distancia recorrida a la fecha</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->device->name }}</td>
                <td>{{ $record->performed_at }}</td>
                <td>{{ $record->total_hours }}</td>
                <td>{{ $record->total_distance }}</td>
            </tr>
        </tbody>
    </table>
    <h2 class="subtitle">Detalles de {{ $record->maintenance->name }}</h2>
    <table class="table is-bordered is-striped is-narrow is-fullwidth">
        <thead>
            <tr>
                <td>actividad</td>
                <td>observación</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($record->activities as $activity)
            <tr>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->pivot->observation }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
