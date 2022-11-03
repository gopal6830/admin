<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IContoller;

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
// login
Route::get('/login', function () {
    return view('login');
});

// addpage
Route::get('/addpage', function () {
    return view('addpage');
});

// pagesummary
Route::get('/pagemanager', function () {
    return view('pagemanager');
});
// categorysummary
Route::get('/catsummary', function () {
    return view('catsummary');
});
Route::get('/addcat', function () {
    return view('addcat');
});
Route::get('/addpro', function () {
    return view('addpro');
});
Route::get('/prosummary', function () {
    return view('prosummary');
});


Route::get('/changepass', function () {
    return view('changepass');
});


 Route::view('login','login');
// Route::get('login', [IContoller::class, 'index'])->name('login');
// Route::get('/login', 'App\Http\Controllers\IController@login');
Route::post('login','App\Http\Controllers\IController@login');
Route::get('logout', 'App\Http\Controllers\IController@logout');




Route::get("/addpage","App\Http\Controllers\IController@add_page");

Route::post('/pagesubmit','App\Http\Controllers\IController@pagesubmit');

Route::get('/pagemanager','App\Http\Controllers\IController@pagemanager');

Route::get('pagedelete/{id}','App\Http\Controllers\IController@pagedelete');

Route::get('pageedit/{id}','App\Http\Controllers\IController@pageedit');

Route::post('edit-form/{id}','App\Http\Controllers\IController@editdata');

Route::post('searchpage','App\Http\Controllers\IController@searchpage');







Route::get("/addcat","App\Http\Controllers\IController@addcat");

Route::post('/catsubmit','App\Http\Controllers\IController@catsubmit');

Route::get('/catsummary','App\Http\Controllers\IController@categorysummary');

Route::get('catdelete/{id}','App\Http\Controllers\IController@catdelete');

Route::get('catedit/{id}','App\Http\Controllers\IController@catedit');

Route::post('edit-cat/{id}','App\Http\Controllers\IController@updatecat');

Route::post('searchcat','App\Http\Controllers\IController@searchcat');




Route::get("/addpro","App\Http\Controllers\IController@addpro");

Route::post('/prosubmit','App\Http\Controllers\IController@prosubmit');

Route::get('/prosummary','App\Http\Controllers\IController@prosummary');

Route::get('prodelete/{id}','App\Http\Controllers\IController@prodelete');

Route::get('prodedit/{id}','App\Http\Controllers\IController@proedit');

Route::post('proupdate/{id}','App\Http\Controllers\IController@proupdate');

Route::post('searchpro','App\Http\Controllers\IController@searchpro');


Route::post('oldpass', 'App\Http\Controllers\Icontroller@oldpass');

//create new pass
Route::post('newpass', 'App\Http\Controllers\Icontroller@newpass');





