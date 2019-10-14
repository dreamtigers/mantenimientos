@extends('layouts.app')

@section('content')
<h1 class="title">Registros</h1>
<table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
        <tr>
            <th>id</th>
            <th>fecha</th>
            <th>vehículo</th>
            <th>rutina realizada</th>
            <th>actividades</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->performed_at }}</td>
                <td>{{ $record->device->name }}</td>
                <td>{{ $record->maintenance->name }}</td>
                <td><a href="{{ route('registros.show', ['record' => $record]) }}">Detalle</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
