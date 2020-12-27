<?php

use App\Rozet;

if (! function_exists('getRank')) {
    function getRank($key, $default = null)
    {

        $rutbe = '';

        $rozetler = Rozet::getRozets();

        foreach ($rozetler as $rozet) {
            if ($key >= $rozet->point) {
                $rutbe = $rozet;
            }
        }

        return $rutbe;
    }
}


