<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class PesoTallaNinas extends Model
{
    protected $table = 'peso_talla_ninas25';
    protected $fillable = [
        'Height', 'SD4neg', 'SD3neg', 'SD2neg', 'SD1neg',
        'SD0', 'SD1', 'SD2', 'SD3', 'SD4',
    ];

    public static function buscar($alias, $talla)
    {
        return DB::connection('mysql')->table($alias . '.peso_talla_ninas25')
            ->whereRaw("Height = $talla")
            ->orderBy('id', 'asc')
            ->first();
    }
}
