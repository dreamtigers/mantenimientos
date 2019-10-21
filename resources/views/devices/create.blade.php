@extends('layouts.app')

@section('content')
<h1 class="title">Nuevo Registro</h1>
    <div class="box">
        {{ Form::open(['action' => 'DeviceController@store']) }}
        <div class="field">
            {{ Form::label('name', 'Nombre del vehículo', ['class' => 'label']) }}
            <div class="date">
                {{ Form::text('device[name]', null, ['class' => 'input']) }}
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                {{ Form::label('model', 'Modelo:', ['class' => 'label']) }}
            </div>
            <div class="field-body">
                <div class="control">
                    {{ Form::text('device[model]', null, ['class' => 'input']) }}
                </div>
            </div>
            <div class="field-label is-normal">
                {{ Form::label('marca', 'Marca:', ['class' => 'label']) }}
            </div>
            <div class="field-body">
                <div class="control">
                    {{ Form::text('detail[marca]', null, ['class' => 'input']) }}
                </div>
            </div>
            <div class="field-body">
                <div class="field-label is-normal">
                    {{ Form::label('detail[anoFabricacion]', 'Año:', ['class' => 'label']) }}
                </div>
                <div class="control">
                    {{ Form::number('detail[anoFabricacion]', null, ['class' => 'input']) }}
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                {{ Form::label('serial', 'Serial:', ['class' => 'label']) }}
            </div>
            <div class="field-body">
                <div class="control">
                    {{ Form::text('detail[serial]', null, ['class' => 'input']) }}
                </div>
            </div>
            <div class="field-label is-normal">
                {{ Form::label('placa', 'Placa:', ['class' => 'label']) }}
            </div>
            <div class="field-body">
                <div class="control">
                    {{ Form::text('detail[placa]', null, ['class' => 'input']) }}
                </div>
            </div>
            <div class="field-body">
                <div class="field-label is-normal">
                    {{ Form::label('detail[arreglo]', 'Arreglo:', ['class' => 'label']) }}
                </div>
                <div class="control">
                    {{ Form::text('detail[arreglo]', null, ['class' => 'input']) }}
                </div>
            </div>
        </div>

        <h2 class="subtitle">Filtros</h2>
        <div class="field">
            {{ Form::label('filtroAceiteMotor', 'Filtro Aceite Motor:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroAceiteMotor]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroAceiteHidraulico', 'Filtro Aceite Hidráulico:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroAceiteHidraulico]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroAceitePrimario', 'Filtro Aceite Primario:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroAceitePrimario]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroAceiteSecundario', 'Filtro Aceite Secundario:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroAceiteSecundario]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroAirePrimario', 'Filtro Aire Primario:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroAirePrimario]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroAireSecundario', 'Filtro Aire Secundario:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroAireSecundario]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroTransmision', 'Filtro Transmisión:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroTransmision]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroTanqueHidraulico', 'Filtro Tanque Hidráulico:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroTanqueHidraulico]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroCombustiblePrimario', 'Filtro Combustible Primario:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroCombustiblePrimario]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroCombustibleSecundario', 'Filtro Combustible Secundario:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroCombustibleSecundario]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('filtroTanqueGasoil', 'Filtro Tanque Gasoil:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[filtroTanqueGasoil]', null, ['class' => 'input']) }}
            </div>
        </div>

        <h2 class="subtitle">Aceites</h2>
        <div class="field">
            {{ Form::label('tipoAceiteHidraulico', 'Tipo Aceite Hidráulico:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[tipoAceiteHidraulico]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('tipoAceiteMotor', 'Tipo Aceite Motor:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[tipoAceiteMotor]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('tipoAceiteTransmision', 'Tipo Aceite Transmisión:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[tipoAceiteTransmision]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('tipoAceiteCaja', 'Tipo Aceite Caja:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[tipoAceiteCaja]', null, ['class' => 'input']) }}
            </div>
        </div>

        <h2 class="subtitle">Capacidades</h2>
        <div class="field">
            {{ Form::label('capacidadCarterMotor', 'Capacidad Carter Motor:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[capacidadCarterMotor]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('capacidadTanqueCaja', 'Capacidad Tanque Caja:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[capacidadTanqueCaja]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('capacidadTanqueTransmision', 'Capacidad Tanque Transmisión:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[capacidadTanqueTransmision]', null, ['class' => 'input']) }}
            </div>
        </div>
        <div class="field">
            {{ Form::label('capacidadTanqueHidraulico', 'Capacidad Tanque Hidráulico:', ['class' => 'label']) }}
            <div class="control">
                {{ Form::text('detail[capacidadTanqueHidraulico]', null, ['class' => 'input']) }}
            </div>
        </div>
        <!-- <div class="field is-narrow">
            {{ Form::label('performed_at', 'Fecha realizada', ['class' => 'label']) }}
                <div class="control">
                    {{ Form::date('name', \Carbon\Carbon::now(), ['class' => 'input']) }}
                </div>
        </div> -->

        <div class="field">
            <div class="control">
                {{ Form::submit('Enviar', ['class' => 'button is-primary']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
