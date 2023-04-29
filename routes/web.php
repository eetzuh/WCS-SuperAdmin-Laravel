<?php

use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAccess;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard',[UserController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware([AdminAccess::class, 'auth'])->group(function (){
    Route::get('/user/create', [UserController::class, 'create'])->name('superadmin.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('superadmin.store');
    Route::get('/user/{user}/edit/', [UserController::class, 'edit'])->name('superadmin.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('superadmin.update');
    Route::delete('/dashboard/{user}', [UserController::class, 'destroy'])->name('superadmin.destroy');
});

Route::get('/user/friends', [FriendsController::class, 'index'])->name('friends.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
