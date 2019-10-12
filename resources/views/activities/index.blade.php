@extends('layouts.app')

@section('content')
<h1 class="title">Registros</h1>
<table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
        <tr>
            <th>id</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
