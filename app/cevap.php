<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Soru;

class cevap extends Model
{
    protected $table = 'cevaplar';
    public $timestamps = false;
    protected $fillable = array('owner', 'questionID', 'parent', 'score');


    public function writer()
    {
        return $this->belongsTo(User::class, 'owner', 'id','writer');
    }

    public function soru()
    {
        return $this->belongsTo(Soru::class,'questionID','id','cevaplar');
    }
}
