<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ImcEdadNinos517 extends Model
{
    protected $table = 'imc_edad_ninos517';
    protected $fillable = [
        'Meses', 'SD2neg', 'SD1neg',
        'SD0', 'SD1', 'SD2', 'SD3',
    ];

    public static function buscar($alias, $meses)
    {
        return DB::connection('mysql')->table($alias . '.imc_edad_ninos517')
            ->whereRaw("Meses = $meses")
            ->orderBy('id', 'asc')
            ->first();
    }
}
