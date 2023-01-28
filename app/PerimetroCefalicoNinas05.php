<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class PerimetroCefalicoNinas05 extends Model
{
    protected $table = 'perimetro_cefalico_ninas05';
    protected $fillable = [
        'Day', 'SD4neg', 'SD3neg', 'SD2neg', 'SD1neg',
        'SD0', 'SD1', 'SD2', 'SD3', 'SD4',
    ];
    public static function buscar($alias, $day)
    {
        return DB::connection('mysql')->table($alias . '.perimetro_cefalico_ninas05')
            ->whereRaw("Day = $day")
            ->orderBy('id', 'asc')
            ->first();
    }
}
