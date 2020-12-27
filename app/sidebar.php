<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sidebar Extends Model
{

        public static function getSoruSayisi()
        {
            $soruSayisi = DB::table('sorus')->count();

            return $soruSayisi;
        }
        public static function getCevapSayisi()
        {
            $cevapSayisi = DB::table('cevaplar')->count();
            return $cevapSayisi;
        }

            public static function getCozumSayisi()
        {
            $cozumSayisi = DB::table('cevaplar')->where('isSolution', '=',1)->count();

            return $cozumSayisi;
        }

            public static function getUserCount()
        {
            $userCount = DB::table('users')->count();
            return $userCount;
        }
            public static function getPopularQuestions()
        {
            $popularQuestions = DB::table('sorus')
                ->leftJoin('users','users.id','=','sorus.owner')->distinct()
                ->leftJoin('cevaplar', 'cevaplar.questionID', '=', 'sorus.id')->distinct()
                ->orderByDesc('views')->get()
                ->unique('title')->take(3);


            return $popularQuestions;
        }
            public static function getLatestAnswers()
        {
            $latestAnswers = DB::table('cevaplar')
                ->leftJoin('users','users.id','=','cevaplar.owner')
                ->leftJoin('sorus', 'sorus.id', '=', 'cevaplar.questionID')
                ->orderByDesc('created_at')
                ->take(3)->get();

            return $latestAnswers;
        }

            public static function getPopularUsers()
        {
            $popularUsers = DB::table('users')
                ->orderByDesc('points')
                ->take(3)->get();

            return $popularUsers;
        }
            public static function getPopulartags()
        {
            $popularTags = DB::table('etikets')
                ->leftJoin('soru_tags','soru_tags.tagID', '=','etikets.id')
                ->selectRaw('COUNT(tagID) as popularity, etikets.id, etikets.name, etikets.slug')
                ->groupBy('etikets.id')
                ->orderByDesc('popularity')
                ->take(15)
                ->get();
            return $popularTags;
        }
}
