<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiket extends Model
{
    public $timestamps = false;
    protected $table = 'etikets';
    protected $fillable = array('slug', 'name', 'color');

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function etiketler()
    {
        return $this->hasMany(soruEtiket::class,'id','tagID');
    }

}
