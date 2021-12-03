<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


// user
Route::get('/', 'SepedaMotor@show');
// Route::post('/result', function(){
//   return view('result');
// });
Route::post('/result', 'SepedaMotor@store');

// admin
Route::get('/admin/dashboard', 'SepedaMotor@dashboard');
Route::get('/admin/dashboard/tambah', 'SepedaMotor@tambahdataadmin');
Route::post('/adminloginver', 'SepedaMotor@adminlogin');
Route::get('/adminlogin', 'SepedaMotor@admin');
Route::get('/adminlogout', 'SepedaMotor@adminlogout');


// data manipulation
Route::post('/tambahdata', 'SepedaMotor@tambahdatamotor');
Route::get('/delete/{id}', 'SepedaMotor@destroy');
Route::get('/admin/dashboard/edit/{id}', 'SepedaMotor@edit');
Route::post('/update/{id}', 'SepedaMotor@update');

Route::get('/clear', function() {
	Artisan::call('optimize:clear');
	Artisan::call('package:discover');
	Artisan::call('cache:clear');
	Artisan::call('config:cache');
	Artisan::call('view:clear');
 	Artisan::call('view:cache');
	Artisan::call('route:clear');
  Artisan::call('route:cache');
	Artisan::call('event:clear');
  Artisan::call('event:cache');
  Artisan::call('storage:link');

	return "Cleared!";
});



// Route::get('/our-team', function (){
//   return view('ourteam');
// });


// Route::post('/U-Care/Form/Tambah',[Ufest::class,'store']);
