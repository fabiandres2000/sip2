<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    protected $table = 'codigos';
    protected $fillable = [
        'num', 'alias', 'id_compania', 'estado', 'id_hogar', 'id_unidad',
    ];

    public static function guardar($alias, $sigla)
    {

        $count = DB::connection('mysql')->table($alias . '.codigos')
            ->count();
        if ($count <= 0) {
            $num = 1;
        } else {
            $resp = DB::connection('mysql')->table($alias . '.codigos')
                ->orderBy('id', 'desc')->first();
            $num = $resp->num + 1;
        }
        $ali = substr($sigla, 0, 4);
        $respuesta = DB::connection('mysql')->table($alias . '.codigos')->updateOrInsert([
            'id' => 0,
        ], [
            'num' => $num,
            'alias' => $ali,
            'id_compania' => 1,
            'estado' => 'Activo',
            'id_hogar' => 0,
            'id_unidad' => 0,
        ]);
        return $ali . $num;
    }

    public static function buscar($alias, $sigla, $id_hogar)
    {
        $resp = DB::connection('mysql')->table($alias . '.codigos')
            ->where('id_hogar', $id_hogar)->first();

        return $resp->alias . $resp->num;
    }

    public static function buscar2($alias, $sigla, $id_unidad)
    {
        $resp = DB::connection('mysql')->table($alias . '.codigos')
            ->where('id_unidad', $id_unidad)->first();

        return $resp->alias . $resp->num;
    }

    public static function editar($alias, $num, $id_hogar, $sigla)
    {
        $ali = substr($sigla, 0, 4);
        $num = explode($ali, $num);

        return DB::connection('mysql')->table($alias . '.codigos')
            ->where('num', $num[1])->update([
            'id_hogar' => $id_hogar,
        ]);
    }

    public static function editar2($alias, $num, $id_unidad, $sigla)
    {
        $ali = substr($sigla, 0, 4);
        $num = explode($ali, $num);

        return DB::connection('mysql')->table($alias . '.codigos')
            ->where('num', $num[1])->update([
            'id_unidad' => $id_unidad,
        ]);
    }
}
