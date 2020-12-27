<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userPoint extends Model
{
    protected $table = 'user_points';
    public $timestamps = false;
    protected $fillable = array('id', 'pointType','user','url','pointValue','date');

    public function pointOwner()
    {
        return $this->belongsTo(User::class,'id','user','pointOwner');
    }
}
