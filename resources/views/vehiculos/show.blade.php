@extends('layouts.app')

@section('content')
<h1 class="title">Información sobre el Equipo</h1>
<div class="box">
    <table class="table is-bordered is-striped is-narrow is-fullwidth">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>hrsMotor</th>
                <th>hrsMantenimiento</th>
                <th>rutina1</th>
                <th>hr1Mant2</th>
                <th>rutina2</th>
                <th>hrsMant3</th>
                <th>rutina3</th>
                <th>hrsMant4</th>
                <th>rutina4</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $equipo->id }}</td>
                <td>{{ $equipo->equipo }}</td>
                <td>{{ $equipo->hrsMotor }}</td>
                <td>{{ $equipo->hrsMantenimiento }}</td>
                <td>{{ $equipo->rutina1 }}</td>
                <td>{{ $equipo->hr1Mant2 }}</td>
                <td>{{ $equipo->rutina2 }}</td>
                <td>{{ $equipo->hrsMant3 }}</td>
                <td>{{ $equipo->rutina3 }}</td>
                <td>{{ $equipo->hrsMant4 }}</td>
                <td>{{ $equipo->rutina4 }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
