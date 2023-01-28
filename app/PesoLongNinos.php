<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class PesoLongNinos extends Model
{
    protected $table = 'peso_longitud_ninos02';
    protected $fillable = [
        'length', 'SD4neg', 'SD3neg', 'SD2neg', 'SD1neg',
        'SD0', 'SD1', 'SD2', 'SD3', 'SD4',
    ];

    public static function buscar($alias, $talla)
    {
        return DB::connection('mysql')->table($alias . '.peso_longitud_ninos02')
            ->whereRaw("length = $talla")
            ->orderBy('id', 'asc')
            ->first();
    }
}
