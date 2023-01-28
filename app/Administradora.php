<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Administradora extends Model
{
    protected $table = 'administradoras';
    protected $fillable = [
        'adm_id', 'adm_cod', 'adm_nombre', 'adm_direc', 'adm_telef', 'adm_nit',
        'adm_dv', 'adm_repres', 'adm_observ', 'adm_domi', 'estado',
    ];

    public static function buscarAdministradoras($alias)
    {
        return DB::connection('mysql')->table($alias . '.administradoras')->orderBy('adm_nombre', 'asc')
            ->where("estado", "Activo")
            ->get();
    }
}
