@extends('layouts.app')

@section('content')
<h1 class="title">Rutinas</h1>
        @foreach ($maintenances as $maintenance)
            <div class="card">
                <div class="card-header">
                    <div class="card-header-title">
                        {{ $maintenance->name }}
                    </div>
                </div>
                <div class="card-content">
                    <ol class="list">
                        @foreach ($maintenance->activities as $activity)
                            <li class="list-item">{{ $activity->description }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        @endforeach
@endsection
