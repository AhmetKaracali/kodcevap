<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kodcevap extends Model
{
    public $timestamps = false;
    protected $table = 'kodcevap';
    protected $fillable = array('siteTitle', 'description', 'logoURL', 'facebook', 'twitter', 'instagram', 'linkedin', 'mail');



}
