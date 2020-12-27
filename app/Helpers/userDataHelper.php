<?php

use App\toplulukFollowers;
use App\User;
use App\userFollowers;
use App\userActivity;

if (! function_exists('getUserData')) {
    function getUserData($key, $default = null)
    {
        //$key= $key->pluck('owner')->first();

        $userData = User::all()->where('id','=',$key);

        return $userData;
    }
}

if (! function_exists('getFollowerData')) {
    function getFollowerData($key, $default = null)
    {

        $userData = User::all()->where('id','=',$key);
        return $userData;
    }
}

if (! function_exists('getFollowingData')) {
    function getFollowingData($key, $default = null)
    {
        $userData = User::all()->where('id','=',$key);
        return $userData;
    }
}


if (! function_exists('isFollowing')) {
    function isFollowing($key1, $key2)
    {

        return userFollowers::all()->where('followed','=',$key1)
            ->where('follower','=',$key2)->isEmpty();
    }
}

if (! function_exists('isCommunityUser')) {
    function isCommunityUser($user, $community)
    {

        return toplulukFollowers::all()->where('userID','=',$user)
            ->where('toplulukID','=',$community)->isEmpty();
    }
}

if (! function_exists('isVotedQuestion')) {
    function isVotedQuestion($question, $user)
    {
        $activity = userActivity::all()->where('user','=',$user)->where('url','=',$question)
            ->where('activityType','<=',2)->first();

        if ($activity == null)
        {
            return false;
        }
        else{
            return $activity;
        }
    }
}

if (! function_exists('isVotedAnswer')) {
    function isVotedAnswer($answer, $user)
    {
        $activity = userActivity::all()->where('user','=',$user)->where('url','=',$answer)
            ->where('activityType','<',5)->where('activityType','>',2)
            ->first();

        if ($activity == null)
        {
            return false;
        }
        else{
            return $activity;
        }
    }
}

if (! function_exists('getVoteColor')) {
    function getVoteColor($key)
{

        if ($key > 0)
        {
            return "color: #3f9809;";
        }
        elseif($key <0)
        {
        return "color: #980909;";
        }
        else{
            return "";
        }
    }
}
