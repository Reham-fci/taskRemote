<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// front design

Route::prefix('panel')->name('panel.')->middleware('auth')->group(function (){
  Route::get('/' , \App\Http\Controllers\PanelController::class)->name('index');
  Route::get('file-manager' , \App\Http\Controllers\FolderManagerController::class)->name('file-manager');
  Route::post('file-manager/folder' , [\App\Http\Controllers\FolderManagerController::class , 'createFolder'])->name('file-manager.folder');
  Route::post('folder/{folder}' , [\App\Http\Controllers\FolderManagerController::class , 'updateFolder'])->name('folder.update');
  Route::delete('folder/{folder}' , [\App\Http\Controllers\FolderManagerController::class , 'deleteFolder'])->name('folder.delete');
  Route::post('file-manager/file' , [\App\Http\Controllers\FileManagerController::class , 'uploadFile'])->name('file-manager.file');
  Route::get('file/{id}' , [\App\Http\Controllers\FileManagerController::class , 'showFile'])->name('file.show');
  Route::delete('file/{file}' , [\App\Http\Controllers\FileManagerController::class , 'deleteFile'])->name('file.delete');
});

Route::view('login' , 'panel.auth.login')->name('login');
Route::view('register' , 'panel.auth.register')->name('register');
Route::view('forget-password' , 'panel.auth.forget-password')->name('forget-password');
require __DIR__.'/auth.php';

// admin panel
Route::prefix('admin')->name('admin.')->group(function (){
    Route::view('login' , 'dashboard.auth.login')->name('login');
    Route::view('register' , 'dashboard.auth.register')->name('register');
    Route::view('forget-password' , 'dashboard.auth.forget-password')->name('forget-password');

    require __DIR__.'/adminAuth.php';
});

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function (){
    Route::get('/' , \App\Http\Controllers\Admin\AdminController::class)->name('index');
    Route::get('folder-manager' , \App\Http\Controllers\Admin\FolderManagerController::class)->name('folder-manager');
    Route::get('file-manager/{folder}' , [\App\Http\Controllers\Admin\FolderManagerController::class , 'showFile'])->name('file-manager.show');
});


Route::group(['prefix' => '/', 'middleware'=>'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/home', fn()=>view('index'))->name('home');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
