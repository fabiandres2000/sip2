<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class TallaEdadNinos519 extends Model
{
    protected $table = 'talla_edad_ninos519';
    protected $fillable = [
        'Meses', 'SD2neg', 'SD1neg',
        'SD0', 'SD1', 'SD2',
    ];

    public static function buscar($alias, $meses)
    {
        return DB::connection('mysql')->table($alias . '.talla_edad_ninos519')
            ->whereRaw("Meses = $meses")
            ->orderBy('id', 'asc')
            ->first();
    }
}
