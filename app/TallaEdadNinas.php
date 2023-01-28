<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class TallaEdadNinas extends Model
{
    protected $table = 'talla_edad_ninas05';
    protected $fillable = [
        'Day', 'SD4neg', 'SD3neg', 'SD2neg', 'SD1neg',
        'SD0', 'SD1', 'SD2', 'SD3', 'SD4',
    ];

    public static function buscar($alias, $dias)
    {
        return DB::connection('mysql')->table($alias . '.talla_edad_ninas05')
            ->whereRaw("Day = $dias")
            ->orderBy('id', 'asc')
            ->first();
    }
}
