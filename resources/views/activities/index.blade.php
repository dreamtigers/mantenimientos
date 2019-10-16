@extends('layouts.app')

@section('content')
<h1 class="title">Actividades</h1>
<table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
        <tr>
            <th>id</th>
            <th>Descripción</th>
            <th>Rutinas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->description }}</td>
                <td>
                    <ul>
                        @foreach($activity->maintenances->pluck('name') as $name)
                            <li>{{ $name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
