<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::middleware('auth')->group(function () {
    Route::resource('entreprise', EntrepriseController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('offre', OffreController::class);
    Route::resource('forum', ForumController::class);
    // Route::resource('comment', CommentController::class);
    Route::post('comment/{forum_id}', [CommentController::class, 'store'])->name('comment.store');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('entreprises',EntrepriseController::class);
Route::get('/entreprise', [App\Http\Controllers\EntrepriseController::class, 'index'])->name('entreprise.index');

Route::get('/actualite', [App\Http\Controllers\ActualiteController::class, 'page1'])->name('actualite');

Route::any('/Formation', [App\Http\Controllers\FormationController::class, 'formation'])->name('route_first');  
Route::any('/Formation/Type', [App\Http\Controllers\FormationController::class, 'type_formation'])->name('route_candidature');

