<?php

use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/liste');
});

// toutes les url commenceront par "/liste"
// et auront le prefix "liste." comme nom de route
Route::prefix('/liste')->name('liste.')->group(function () {

    Route::get('/', [WordController::class, 'index'])->name('index');

    Route::get('/create', [WordController::class, 'create'])->name('create');
    Route::post('/create', [WordController::class, 'store']);

    Route::get('/{word}/edit', [WordController::class, 'edit'])->name('edit'); // ex: /liste/10/edit
    Route::post('/{word}/edit', [WordController::class, 'update']);

    Route::get('/{word}/delete', [WordController::class, 'destroy'])->name('delete');;
    
    Route::get('/{slug}-{id}', [WordController::class, 'show'])
    ->where([
        "id" => '[0-9]+', // on accepte que des nombres
        "slug" => '[a-z0-9\-]+' // on accepte que des nombres, des lettres et des tirets
    ])
    ->name('showOne');
});

Route::get('/mot-du-jour', [WordController::class, 'showTodayWord'])
->name('showTodayWord');