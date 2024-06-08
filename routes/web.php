<?php

use App\Models\Competitions;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DatasetsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompetitionsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/totalusers','TotalUsersController@getTotalUsers')->middleware(['auth','verified']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/model', function () {
    return view('model');
})->middleware(['auth', 'verified'])->name('model');


Route::get('/competitions', function () {
    return view('competitions');
})->middleware(['auth', 'verified'])->name('competitions');

// Route::get('/users', function () {
//     return view('users');
// })->middleware(['auth', 'verified'])->name('users');

Route::delete('/delete/{competition_id}', [CompetitionsController::class, 'destroy'])->middleware(['auth','verified']);
Route::delete('/delete/{id}/model', [ModelController::class, 'destroy'])->middleware(['auth','verified']);
Route::get('/competitions/{competition_id}/edit', [CompetitionsController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/competitions/{competition_id}/edit', [CompetitionsController::class, 'update'])->middleware(['auth', 'verified']);

Route::get('/users/{user_id}/edit', [UsersController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/users/{user_id}/edit', [UsersController::class, 'update'])->middleware(['auth', 'verified']);
Route::post('/create/competitions', [CompetitionsController::class, 'store'])->middleware(['auth','verified']);
Route::get('/create/competitions', [CompetitionsController::class, 'create'])->middleware(['auth','verified']);
Route::get('/create/model', [ModelController::class, 'create'])->middleware(['auth','verified']);
Route::post('/create/model', [ModelController::class, 'store'])->middleware(['auth','verified']);
Route::put('/model/{id}/edit', [ModelController::class, 'update'])->middleware(['auth', 'verified']);
Route::put('/edit/{id}/datasets', [DatasetsController::class, 'update'])->middleware(['auth', 'verified']);
Route::get('/model/{id}/edit', [ModelController::class, 'edit'])->middleware(['auth', 'verified']);
Route::get('/create/datasets', [DatasetsController::class, 'index'])->middleware(['auth','verified']);
Route::get('/edit/{id_dataset}/datasets', [DatasetsController::class, 'edit'])->middleware(['auth','verified']);
Route::post('/edit/{id_dataset}/datasets', [DatasetsController::class, 'update'])->middleware(['auth','verified']);
Route::post('/create/datasets', [DatasetsController::class, 'store'])->middleware(['auth','verified']);
Route::get('/datasets', [DatasetsController::class, 'show'])->middleware(['auth', 'verified'])->name('datasets');
Route::get('/users', [UsersController::class, 'show'])->middleware(['auth', 'verified'])->name('users');
Route::get('/create/users', [UsersController::class, 'index'])->middleware(['auth', 'verified']);
Route::post('/create/users', [UsersController::class, 'store'])->middleware(['auth', 'verified']);
Route::delete('/delete/{user_id}', [UsersController::class, 'destroy'])->middleware(['auth','verified']);
Route::get('/model', [ModelController::class, 'index'])->middleware(['auth', 'verified'])->name('model');
Route::get('/competitions', [CompetitionsController::class, 'index'])->middleware(['auth', 'verified'])->name('competitions');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
