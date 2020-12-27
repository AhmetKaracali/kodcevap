<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $table = 'reporteds';
    protected $fillable = array('reported_at', 'reporterUser', 'reportedUser', 'reportType', 'contentID');
}
