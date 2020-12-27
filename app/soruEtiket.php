<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soruEtiket extends Model
{
    protected $table = 'soru_tags';
    public $timestamps = false;
    protected $fillable = array('soruID', 'tagID');

    public function getRouteKeyName()
    {
        return 'slug';
    }

        public static function getSoruEtikets(Soru $soruid)
        {
            return soruEtiket::with('etiket')->where('soruID','=',$soruid);
        }
   public  function sorular()
   {
       return $this->hasMany(Soru::class,'id','soruID');
   }

   public function etiket()
   {
       return $this->belongsTo(Etiket::class,'tagID','id','etiket');
   }


}
