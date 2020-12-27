<?php


namespace App\Http\View\Composers;


use App\sidebar;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $soruSayisi = sidebar::getSoruSayisi();
        $cevapSayisi = sidebar::getCevapSayisi();
        $cozumSayisi = sidebar::getCozumSayisi();
        $userCount  = sidebar::getUserCount();
        $popularQuestions = sidebar::getPopularQuestions();
        $latestAnswers = sidebar::getLatestAnswers();
        $popularUsers   = sidebar::getPopularUsers();
        $popularTags= sidebar::getPopularTags();

        $view->with(compact('soruSayisi', 'cevapSayisi', 'cozumSayisi', 'userCount', 'popularQuestions',
            'latestAnswers', 'popularUsers', 'popularTags'));
        /*
        $view->with('soruSayisi', $soruSayisi);
        $view->with('cevapSayisi', $cevapSayisi);
        $view->with('cozumSayisi', $cozumSayisi);
        $view->with('userCount', $userCount);
        $view->with('popularQuestions', $popularQuestions);
        $view->with('latestAnswers', $latestAnswers);
        $view->with('popularUsers', $popularUsers);
        $view->with('popularTags', $popularTags);
        */
    }
}
