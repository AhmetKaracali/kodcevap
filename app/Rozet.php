<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rozet extends Model
{
    protected $table = 'rozets';
    protected $fillable = array('point', 'name', 'color');

    public static function getRozets()
    {
        return $rozets = Rozet::all();
    }
}
