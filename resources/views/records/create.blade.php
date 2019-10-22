@extends('layouts.app')

@section('content')
<h1 class="title">Nuevo Registro</h1>
    <div class="box">
        {{ Form::open(['action' => 'RecordController@store']) }}
        <div class="field">
            {{ Form::label('device_id', 'Vehículo', ['class' => 'label']) }}
            <div class="control">
                <div class="select">
                    {{ Form::select('device_id', auth()->user()->devices->pluck('name', 'id'), null, ['placeholder' => 'Seleccione un vehículo']) }}
                </div>
            </div>
        </div>

        <div class="field">
            {{ Form::label('performed_at', 'Fecha realizada', ['class' => 'label']) }}
                <div class="control">
                    {{ Form::date('performed_at', \Carbon\Carbon::now(), ['class' => 'input']) }}
                </div>
        </div>

        <div class="field">
            {{ Form::label('maintenance_id', 'Tipo de Mantenimiento', ['class' => 'label']) }}
            <div class="control">
                <div class="select">
                    {{ Form::select('maintenance_id', $maintenances->pluck('name', 'id'), null, ['placeholder' => 'Seleccione un mantenimiento', 'onChange' => 'updateMant()']) }}
                </div>
            </div>
        </div>

        {{ Form::label('maintenance_id', 'Actividades', ['class' => 'label']) }}
            <table class="table is-bordered is-striped is-narrow is-fullwidth">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Realizada</th>
                        <th>Observación</th>
                    </tr>
                </thead>
                <tbody id="activities_list">
                </tbody>
            </table>

        <div class="field">
            <div class="control">
                {{ Form::submit('Enviar', ['class' => 'button is-primary']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
<script>
    // maintenances start at 1 in the db, but maintenances' activities are
    // stored in an array, and arrays start at 0
    // hence the need of '-1' when selecting the maintenance_id in the
    // updateMant function

    // Maybe I should use an api
    const activities = @json($maintenances->pluck('activities')->transform(function ($act) { return $act->pluck('description', 'id'); }));

    var act_list = document.getElementById('activities_list');

    function updateMant() {
        mt_id = document.getElementById('maintenance_id').value -1;
        // console.log(activities[maintenance_id]);
        if (mt_id >= 0) {
            // clean the tag
            removeChildren(act_list);

            // https://stackoverflow.com/a/5737136
            for (var id in activities[mt_id]) {
                // console.log(activities[mt_id][id]);
                var row = createTR(id, activities[mt_id][id]);
                act_list.appendChild(row);
            }
        } else {
            removeChildren(act_list);
        }
    }

    function createTR(key, value) {
        var row = document.createElement("TR");

        var text = document.createTextNode(value);
        var description = createTD(text);

        var checkboxNode = createCheckbox(key);
        var checkbox = createTD(checkboxNode);

        var textbox = createTextbox(key);
        var observation = createTD(textbox);

        row.appendChild(description);
        row.appendChild(checkbox);
        row.appendChild(observation);
        return row;
    }

    function createCheckbox(id) {
        var checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.name = "activities[" + id + "]";
        checkbox.id = "act_" + id;

        return checkbox;
    }

    function createTextbox(id) {
        var textbox = document.createElement("input");
        textbox.type = "text";
        textbox.className = "input";
        textbox.name = "observations[" + id + "]";
        textbox.id = "observation_" + id;

        return textbox;
    }

    function createTD(node) {
        var td = document.createElement("TD");
        if (node) {
            td.appendChild(node);
        }

        return td;
    }

    function removeChildren(node) {
        while (node.firstChild) {
            node.removeChild(node.firstChild);
        }
    }
</script>
@endsection
