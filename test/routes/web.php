<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobContainerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

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
Route::middleware(['auth'])->group(function () {
Route::resource('Template',TemplateController::class);
Route::resource('Container',ContainerController::class);
Route::resource('Job',JobController::class);
Route::resource('Jc',JobContainerController::class);
Route::resource('Login',LoginController::class);
Route::resource('Home',HomeController::class);
Route::get('/Profile/index',[ProfileController::class, 'index'])->name('profile.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');