<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobContainerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShellinaboxController;


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

Route::get('/', 'App\Http\Controllers\WelcomeController@index');

Route::middleware(['auth'])->group(function () {
//kategori
Route::resource('Kategori',KategoriController::class);
Route::post('/Kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/Kategori/destroy/{id}',[KategoriController::class, 'destroy'])->name('kategori.destroy');

//user
Route::resource('User',UserController::class);
Route::get('User/create', [UserController::class, 'create'])->name('user.create');
Route::post('User/update', [UserController::class, 'store'])->name('user.store');


//template
Route::resource('Template',TemplateController::class);
Route::post('/Template/update/{id}', [TemplateController::class, 'update'])->name('template.update');
Route::delete('/Template/destroy/{id}',[TemplateController::class, 'destroy'])->name('template.destroy');
Route::patch('/Template/{id}/update-bolehkan', [TemplateController::class, 'updateBolehkan'])->name('template.update_bolehkan');

//container
Route::resource('Container',ContainerController::class);
Route::post('/Container/update/{id}', [ContainerController::class, 'update'])->name('container.update');
Route::delete('/Container/destroy/{id}',[ContainerController::class, 'destroy'])->name('container.destroy');
Route::put('/Container/{id}/toggle-status', [ContainerController::class, 'toggleStatus']);
Route::patch('/Container/{id}/update-bolehkan', [ContainerController::class, 'updateBolehkan'])->name('container.update_bolehkan');
Route::get('/getContainerId/{id}', [ContainerController::class, 'getContainerId']);



//job
Route::resource('Job',JobController::class);
Route::resource('Jc',JobContainerController::class);
Route::resource('Home',HomeController::class);
Route::get('/Profile/index',[ProfileController::class, 'index'])->name('profile.index');
Route::get('/Panduan/index1',[ProfileController::class, 'indexPanduan1'])->name('panduan1.index');
Route::get('/Panduan/index2',[ProfileController::class, 'indexPanduan2'])->name('panduan2.index');
Route::get('/Panduan/index3',[ProfileController::class, 'indexPanduan3'])->name('panduan3.index');



Route::get('/shellinabox/{container_id}', [ShellinaboxController::class, 'show'])->name('shellinabox');



});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

#change password
Route::get('/user/password',[ChangePasswordController::class,'CPassword'])->name('change.password');
Route::post('/password/update',[ChangePasswordController::class,'UpdatePassword'])->name('password.updated');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
