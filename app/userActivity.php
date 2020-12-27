<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userActivity extends Model
{
    protected $table = 'user_activities';
    public $timestamps = false;
    protected $fillable = array('id', 'activityType','user','url','date');


    public function activityOwner()
    {
        return $this->belongsTo(User::class,'id','user','activityOwner');
    }

}
