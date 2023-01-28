<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ImcEmbarazadas extends Model
{
    protected $table = 'imc_embarazadas';
    protected $fillable = [
        'semana',
        'obesidad', 
        'sobrepeso_min', 
        'sobrepeso_max', 
        'adecuado_min',
        'adecuado_max', 
        'bajo_peso'
    ];

    public static function buscar($alias, $semanas)
    {
        return DB::connection('mysql')->table($alias . '.imc_embarazadas')
        ->whereRaw("semana = $semanas")
        ->first();
    }

}
