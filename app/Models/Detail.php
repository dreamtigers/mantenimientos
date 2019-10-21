<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    // The connection name for the model.
    protected $connection = 'mysql';
    // The table associated with the model.
    protected $table = 'mt_details';

    protected $fillable = [
        'marca', 'serial', 'arreglo', 'placa', 'anoFabricacion',

        'filtroAceiteMotor', 'filtroAceiteHidraulico', 'filtroAirePrimario',
        'filtroAireSecundario', 'filtroTransmision', 'filtroTanqueHidraulico',
        'filtroCombustiblePrimario', 'filtroCombustibleSecundario',
        'filtroTanqueGasoil',

        'tipoAceiteHidraulico', 'tipoAceiteMotor', 'tipoAceiteTransmision',
        'tipoAceiteCaja',

        'capacidadCarterMotor', 'capacidadTanqueCaja',
        'capacidadTanqueTransmision', 'capacidadTanqueHidraulico',
    ];

    public function device()
    {
        return $this->belongsTo('App\Models\Traccar\Device'); // fk: device_id
    }
}
