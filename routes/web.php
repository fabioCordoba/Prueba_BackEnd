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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('publicar', 'HomeController@Publicar')->name('publicar');
Route::get('enviar',function(){
    $users = App\User::all();
    foreach ($users as $user) {
        Mail::send('emails',['user' => $user],function($m) use ($user){
            $m->from('Admin@laravel.com','Administrador');
            $m->to($user->email,$user->name)->subject('Hola '. $user->name . ', Tenemos Novedades.');
        });
    }
    
})->name('enviar');




