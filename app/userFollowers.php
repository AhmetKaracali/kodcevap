<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userFollowers extends Model
{
    protected $table = 'user_followers';
    public $timestamps = false;
    protected $fillable = array('followed', 'follower', 'date');

    public function followers()
    {
        return $this->belongsTo(User::class,'followed','id','followers');
    }

    public function following()
    {
        return $this->belongsTo(User::class,'follower','id','following');
    }
}
