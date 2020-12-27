<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = array('name','username', 'points', 'regDate', 'about', 'ppURL', 'birthdate', 'cinsiyet', 'facebookURL', 'instagramURL', 'twitterURL', 'linkedinURL', 'email', 'email_verified_at', 'password', );

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function sorular()
    {
        return $this->hasMany(Soru::class,'owner','id');
    }

    public function soruCevaplar()
    {
        return $this->hasMany(cevap::class,'owner','id');
    }

    public function topluluks()
    {
        return $this->hasMany(toplulukFollowers::class,'userID',
            'id');
    }

    public function followers()
    {
        return $this->hasMany(userFollowers::class, 'followed','id');
    }

    public function follows()
    {
        return $this->hasMany(userFollowers::class,'follower','id');
    }

    /**
     * @inheritDoc
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    /**
     * @inheritDoc
     */
    public function getAuthIdentifier()
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }
    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $token
     *
     * @return void
     */
    public function setRememberToken($token)
    {
        $this->setRememberToken($token);
    }
    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
