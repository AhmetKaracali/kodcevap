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
Route::post('/soru/{soruid}', 'Api\ApiCevapController@store');
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
Route::get('/getUserData/{id}','Api\ApiUserController@getUserByID');
Route::post('/kaydol', 'Api\ApiUserController@registerWithApi');
Route::post('/giris', 'Api\ApiUserController@loginAPI');
Route::get('/cikis','Api\Auth\LoginController@logout');
Route::get('/profil/{user}/duzenle', 'Api\ApiUserController@edit');
Route::post('/profil/{user}/duzenle', 'Api\ApiUserController@update');
Route::get('/profil/{user}/changepw', 'Api\ApiUserController@changepw');
Route::post('/profil/{user}/changepw', 'Api\ApiUserController@updatepw');
Route::get('/sor', 'Api\ApiSoruController@create');
Route::post('/sor', 'Api\ApiSoruController@store');
Route::post('/oyVer', 'Api\ApiSoruController@voteQuestion');
Route::post('/oyVerYorum', 'Api\ApiCevapController@voted');
Route::post('/cozumIsaretle', 'Api\ApiCevapController@cozumisaret');
Route::post('/getNotifications', 'Api\ApiUserController@showNotifications');
Route::post('/takipet', 'Api\ApiUserFollowersController@follow');
Route::post('/takipbirak', 'Api\ApiUserFollowersController@unfollow');
Route::post('/followTopluluk', 'Api\ApiToplulukController@follow');
Route::post('/unfollowTopluluk', 'Api\ApiToplulukController@unfollow');
Route::get('/getPopularUsers','Api\ApiUserController@getPopularUsers');

Route::post('/isVotedQuestion','Api\ApiUserController@questionVoteHelper');
Route::post('/isVotedAnswer','Api\ApiUserController@answerVoteHelper');
Route::post('/isFollowingUser','Api\ApiUserController@userFollowHelper');
Route::post('/isFollowingTopluluk','Api\ApiUserController@toplulukFollowHelper');

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
