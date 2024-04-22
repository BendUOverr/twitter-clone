<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [DashboardController::class , 'index'])->name('ideas.index');


Route::get('/ideas/{id}', [IdeaController::class , 'show'])->name('ideas.show');
Route::post('/ideas', [IdeaController::class , 'store'])->name('ideas.store');
Route::delete('/ideas/{id}', [IdeaController::class , 'destroy'])->name('ideas.destroy')->middleware('auth');
Route::get('/ideas/edit/{id}', [IdeaController::class , 'edit'])->name('ideas.edit')->middleware('auth');
Route::put('/ideas/{id}', [IdeaController::class , 'update'])->name('ideas.update')->middleware('auth');


Route::post('/ideas/{id}/comments', [CommentController::class , 'store'])->name('ideas.comments.store')->middleware('auth');


Route::get('/register', [AuthController::class , 'register'])->name('register');
Route::post('/register', [AuthController::class , 'store']);
Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::post('/login', [AuthController::class , 'authenticate']);
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

Route::resource('users', UserController::class)->only('show','edit','update')->middleware('auth');
Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('ideas/{id}/like',[IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{id}/unlike',[IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');


Route::get('/terms', function (){
 return view('terms');
})->name('terms');






