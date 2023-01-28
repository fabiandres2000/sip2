<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ImcNinos05 extends Model
{
    protected $table = 'imcninos05';
    protected $fillable = [
        'day', 'SD4neg', 'SD3neg', 'SD2neg', 'SD1neg',
        'SD0', 'SD1', 'SD2', 'SD3', 'SD4'
    ];

    public static function buscar($alias, $dias)
    {
        return DB::connection('mysql')->table($alias . '.imcninos05')
            ->whereRaw("day = $dias")
            ->orderBy('id', 'asc')
            ->first();
    }
}
