<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soru extends Model
{
    public $timestamps = false;
    protected $table = 'sorus';
    protected $fillable = array('toplulukID', 'title', 'body', 'slug', 'owner', 'crdate', 'vote', 'views');


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function getSoru(Soru $soru)
    {
        return $soru;

    }

    public static function findById(String $id)
    {
        return Soru::all()->where('id','=',$id)->first();
    }

    public function soran()
    {
        return $this->belongsTo(User::class, 'owner','id','soran');
    }

    public function cevaplar()
    {
        return $this->hasMany(cevap::class,'id','questionID');
    }

    public function soruEtiketleri()
    {
        return $this->hasMany(soruEtiket::class,'id','soruID');
    }

    public function topluluk()
    {
        return $this->belongsTo(Topluluk::class,'toplulukID','id','soruTopluluk');
    }

}
