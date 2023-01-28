<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Muni extends Model
{
    protected $table = 'muni';
    protected $fillable = [
        'codmun',
        'descripcion',
        'coddep',
        'id',
        'codigo',
        'actual',
    ];

    public static function buscarMunicipios($alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->select('muni.codmun', 'muni.descripcion', 'muni.coddep', 'dptos.codigo')
            ->orderBy('dptos.codigo', 'asc')
            ->orderBy('muni.descripcion', 'asc')
            ->get();
    }

    public static function buscarMunicipios2($alias, $id_dpto, $id_mun)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->select('muni.codmun', 'muni.descripcion', 'muni.coddep', 'dptos.codigo')
            ->where('dptos.codigo', $id_dpto)
            ->where('muni.codmun', $id_mun)
            ->orderBy('dptos.codigo', 'asc')
            ->orderBy('muni.descripcion', 'asc')
            ->get();
    }
}
