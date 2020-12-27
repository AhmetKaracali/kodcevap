<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toplulukFollowers extends Model
{
    protected $table = 'topluluk_followers';
    protected $fillable = array('toplulukID', 'userID', 'created_at','updated_at');


    public function topluluk()
    {
        return $this->belongsTo(Topluluk::class,'id','toplulukID','followers');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'userID','id','user');
    }
}
