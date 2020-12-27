<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topluluk extends Model
{
    public $timestamps = false;
    protected $table = 'topluluks';
    protected $fillable = array('slug', 'name', 'color');

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function followers()
    {
        return $this->hasMany(toplulukFollowers::class,'id','toplulukID');
    }

    public function user()
    {
        return $this->hasMany(toplulukFollowers::class,'toplulukID','id');
    }

    public function soruTopluluk()
    {
        return $this->hasMany(Soru::class,'toplulukID','id');
    }

}
