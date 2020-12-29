<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', 'Api\ApiKodcevapController@index');
Route::get('/soru/{soruid}', 'Api\ApiSoruController@getSoru');
Route::post('/soru/{soruid}', 'Api\CevapController@store');
Route::get('/etiketler', 'Api\ApiEtiketController@index');
Route::get('/etiketler/{etiket}', 'Api\ApiEtiketController@show');
Route::get('/topluluklar', 'Api\ApiToplulukController@index');
Route::get('/topluluklar/{topluluk}','Api\ApiToplulukController@show');
Route::get('/uyeler','Api\ApiUserController@showUsers');
Route::get('/profil/{user}', 'Api\ApiUserController@showAbout');
Route::get('/profil/{user}/sorular', 'Api\ApiUserController@showQuestions');
Route::get('/profil/{user}/cevaplar', 'Api\ApiUserController@showAnswers');
Route::get('/profil/{user}/cozumler', 'Api\ApiUserController@showSolutions');
Route::get('/profil/{user}/takipci','Api\ApiUserController@showTakipci');
Route::get('/profil/{user}/takip', 'Api\ApiUserController@showTakip');
Route::post('/kaydol', 'Api\Auth\RegisterController@register');
Route::get('/kaydol', function(){ return view('main.kaydol');});
Route::post('/giris', 'Api\Auth\LoginController@login');
Route::get('/giris', function(){ return view('main.giris'); });
Route::get('/cikis','Api\Auth\LoginController@logout');
Route::get('/profil/{user}/duzenle', 'Api\UserController@edit');
Route::post('/profil/{user}/duzenle', 'Api\UserController@update');
Route::get('/profil/{user}/changepw', 'Api\UserController@changepw');
Route::post('/profil/{user}/changepw', 'Api\UserController@updatepw');
Route::get('/sor', 'Api\SoruController@create');
Route::post('/sor', 'Api\SoruController@store');
Route::post('/oyVer', 'Api\SoruController@voted');
Route::post('/oyVerYorum', 'Api\CevapController@voted');
Route::post('/cozumIsaretle', 'Api\CevapController@cozumisaret');
Route::get('/profil/{user}/aktivite','Api\UserController@showActivity');
Route::get('profil/{user}/puanlar', 'Api\UserController@showPoints');
Route::post('/takipet', 'Api\UserFollowersController@follow');
Route::post('/takipbirak', 'Api\UserFollowersController@unfollow');
Route::post('/followTopluluk', 'Api\ToplulukController@follow');
Route::post('/unfollowTopluluk', 'Api\ToplulukController@unfollow');

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


Auth::routes();
