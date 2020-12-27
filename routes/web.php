<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'KodcevapController@index');
Route::get('/soru/{soruid}', 'SoruController@index');
Route::post('/soru/{soruid}', 'CevapController@store');
Route::get('/etiketler', 'EtiketController@index');
Route::get('/etiketler/{etiket}', 'EtiketController@show');
Route::get('/topluluklar', 'ToplulukController@index');
Route::get('/topluluklar/{topluluk}','ToplulukController@show');
Route::get('/uyeler','userController@showUsers');
Route::get('/profil/{user}', 'UserController@showAbout');
Route::get('/profil/{user}/sorular', 'UserController@showQuestions');
Route::get('/profil/{user}/cevaplar', 'UserController@showAnswers');
Route::get('/profil/{user}/cozumler', 'UserController@showSolutions');
Route::get('/profil/{user}/takipci','UserController@showTakipci');
Route::get('/profil/{user}/takip', 'UserController@showTakip');
Route::post('/kaydol', 'Auth\RegisterController@register');
Route::get('/kaydol', function(){ return view('main.kaydol');});
Route::post('/giris', 'Auth\LoginController@login');
Route::get('/giris', function(){ return view('main.giris'); });
Route::get('/cikis','Auth\LoginController@logout');
Route::get('/profil/{user}/duzenle', 'UserController@edit');
Route::post('/profil/{user}/duzenle', 'UserController@update');
Route::get('/profil/{user}/changepw', 'UserController@changepw');
Route::post('/profil/{user}/changepw', 'UserController@updatepw');
Route::get('/sor', 'SoruController@create');
Route::post('/sor', 'SoruController@store');
Route::post('/oyVer', 'SoruController@voted');
Route::post('/oyVerYorum', 'CevapController@voted');
Route::post('/cozumIsaretle', 'CevapController@cozumisaret');
Route::get('/profil/{user}/aktivite','UserController@showActivity');
Route::get('profil/{user}/puanlar', 'UserController@showPoints');
Route::post('/takipet', 'UserFollowersController@follow');
Route::post('/takipbirak', 'UserFollowersController@unfollow');
Route::post('/followTopluluk', 'ToplulukController@follow');
Route::post('/unfollowTopluluk', 'ToplulukController@unfollow');
Route::get('/blog/{post}', 'BlogPostController@show');
Route::get('/blog', 'BlogPostController@index');
Route::get('/blog/kategori/{category}', 'BlogCategoryController@show');
Route::post('/blog/{postid}', 'YorumController@store');

Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('/admin/{page}', function () {
    return view('admin.blank');
});


Route::get('yardim', function () {
        return view('main.yardim');
});

Route::get('rozetler', function () {
    return view('main.rozetler');
});

Route::get('ara/{arama}', function (){
    return view('main.search');
});
Route::get('ara', function (){
    return view('main.search');
});

Route::get('hakkimizda', function (){
    return view('main.hakkimizda');
});
Route::get('iletisim', function (){
    return view('main.iletisim');
});

Route::get('mesajgonder', 'telegramController@sendMessage');

Auth::routes();
