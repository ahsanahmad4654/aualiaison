<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FruitsController;
use App\Http\Controllers\vegetablesController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\RiceController;
use App\Http\Controllers\SpiceseController;
use App\Http\Controllers\FertilizersController;
use App\Http\Controllers\GrainPulsesController;
use App\Http\Controllers\AboutUsCOntroller;

use App\Http\Controllers\DriedController;
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
    return view('Home');
});


Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::resource('user', 'UserController');

    Route::resource('permission', 'PermissionController');


    Route::get('/profile', 'UserController@profile')->name('user.profile');

    Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');

    Route::get('/password/change', 'UserController@getPassword')->name('userGetPassword');

    Route::post('/password/change', 'UserController@postPassword')->name('userPostPassword');
});


Route::group(['middleware' => ['auth', 'role_or_permission:admin|create role|create permission']], function() {

    Route::resource('role', 'RoleController');


});





Route::group(['prefix' => 'admin'], function() {
    Route::auth();
});



/////////////////aualison //////
Route::get('fruits',[FruitsController::class, 'index']); 
Route::get('vegetables',[vegetablesController::class, 'index']); 
Route::get('contactus',[ContactusController::class, 'index']); 
Route::get('rice',[RiceController::class, 'index']); 
Route::get('spices',[SpiceseController::class, 'index']); 
Route::get('fertilizers',[FertilizersController::class, 'index']); 
Route::get('grain&pulses',[GrainPulsesController::class, 'index']); 
Route::get('aboutus',[AboutUsCOntroller::class, 'index']); 
Route::get('drieds',[DriedController::class, 'index']); 
Route::post('/send-message', [ContactusController::class,'sendEmail'])->name('contact.send');
//////////////////////////////// axios request

Route::get('/getAllPermission', 'PermissionController@getAllPermissions');
Route::post("/postRole", "RoleController@store");
Route::get("/getAllUsers", "UserController@getAll");
Route::get("/getAllRoles", "RoleController@getAll");
Route::get("/getAllPermissions", "PermissionController@getAll");

/////////////axios create user
Route::post('/account/create', 'UserController@store');
Route::put('/account/update/{id}', 'UserController@update');
Route::delete('/delete/user/{id}', 'UserController@delete');
Route::get('/search/user', 'UserController@search');
