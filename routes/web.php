<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RamenController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/ramens', [RamenController::class, 'index'])->name('ramens.index');
Route::get('/ramens/create', [RamenController::class, 'create'])->name('ramens.create');
Route::get('/ramens/mylist', [RamenController::class, 'mylist'])->name('ramens.mylist');

Route::post('/ramens', [RamenController::class, 'store'])->name('ramens.store'); 
Route::get('/ramens/{ramen}/edit', [RamenController::class, 'edit'])->name('ramens.edit');
Route::put('/ramens/{ramen}/', [RamenController::class, 'update'])->name('ramens.update');
Route::delete('/ramens/{ramen}', [RamenController::class, 'destroy'])->name('ramens.destroy');

Route::get('/ramens/map', [RamenController::class, 'showmap'])->name('ramens.showmap');
Route::get('/ramens/map/{prefecture}', [RamenController::class, 'map'])->name('ramens.map');
Route::get('/ramens/recomend', [RamenController::class, 'recomend'])->name('ramens.recomend');

Route::get('/ramens/{id}', [RamenController::class, 'showrecord'])->name('ramens.showrecord');
