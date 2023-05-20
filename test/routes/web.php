<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobContainerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
//kategori
Route::resource('Kategori',KategoriController::class);
Route::post('/Kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/Kategori/destroy/{id}',[KategoriController::class, 'destroy'])->name('kategori.destroy');

//user
Route::resource('User',UserController::class);

//template
Route::resource('Template',TemplateController::class);
Route::post('/Template/update/{id}', [TemplateController::class, 'update'])->name('template.update');
Route::delete('/Template/destroy/{id}',[TemplateController::class, 'destroy'])->name('template.destroy');

//container
Route::resource('Container',ContainerController::class);
Route::post('/Container/update/{id}', [ContainerController::class, 'update'])->name('container.update');
Route::delete('/Container/destroy/{id}',[ContainerController::class, 'destroy'])->name('container.destroy');
Route::put('/Container/{id}/toggle-status', [ContainerController::class, 'toggleStatus']);


//job
Route::resource('Job',JobController::class);
Route::resource('Jc',JobContainerController::class);
Route::resource('Home',HomeController::class);
Route::get('/Profile/index',[ProfileController::class, 'index'])->name('profile.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');