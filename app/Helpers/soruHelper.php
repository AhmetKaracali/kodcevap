<?php

use App\Etiket;
use App\Soru;
use App\cevap;
use App\Topluluk;
use App\soruEtiket;

if (! function_exists('getCommentCount')) {
    function getCommentCount(Soru $soru, $default = null)
    {
        return cevap::all()->where('questionID','=',$soru->id)->count();
    }
}

if (! function_exists('isSolutioned')) {
    function isSolutioned(Soru $soru, $default = null)
    {
        foreach (cevap::all()->where('questionID','=',$soru->id) as $cevap)
        {
            if ($cevap->isSolution ==1)
            {
                return 1;
            }
        }
        return 0;
    }
}

if (! function_exists('toplulukBul')) {
    function toplulukBul(Soru $soru, $default = null)
    {

        $topluluk = Topluluk::all()->where('id','=',$soru->toplulukID)->first();

                if ($topluluk != null)
                {
                    return $topluluk;
                }
                else {

                    return Topluluk::all()->where('id','=',1)->first();
                }
    }
}

if (! function_exists('etiketBul')) {
    function etiketBul(Soru $soru, $default = null)
    {
        $etikets = soruEtiket::all()->where('soruID','=',$soru->id);

        if($etikets->isNotEmpty())
        {
            return $etikets->all();
        }

        return NULL;

    }
}

if (! function_exists('etiketDetails')) {
    function etiketDetails(String $id, $default = null)
    {
        $etiket = Etiket::all()->where('id','=',$id)->first();

        if($etiket != null)
        {
            return $etiket;
        }

        return NULL;

    }
}

if (! function_exists('soruBul')) {
    function soruBul($soruid, $default = null)
    {
        $soru = Soru::all()->where('id','=',$soruid)->first();


        return $soru;

    }
}

