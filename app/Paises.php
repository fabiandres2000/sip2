<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = 'paises';
    protected $fillable = [
        'iso',
        'nombre',
    ];

    public static function buscar($alias)
    {
        return DB::connection('mysql')->table($alias . '.paises')->orderBy('nombre', 'asc')->get();
    }
}
