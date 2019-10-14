@extends('layouts.app')

@section('content')
<h1 class="title">Actividades</h1>
<table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
        <tr>
            <th>id</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Rutina</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->maintenance->type }}</td>
                <td>{{ $activity->maintenance->period }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
