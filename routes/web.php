<?php

use App\Http\Controllers\FriendsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAccess;
use App\Models\Friends;
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
Route::post('/dashboard/friends', [FriendsController::class, 'store'])->name('friends.store');
Route::put('/dashboard/update', [FriendsController::class, 'update'])->name('friends.update');
Route::delete('/dashboard', [FriendsController::class, 'updateRequest'])->name('friends.destroy');
//Route::delete('/dashboard/deny', [FriendsController::class, 'denyRequest'])->name('friends.deny');
Route::get('/user/friends/chat', [MessagesController::class, 'index'])->name('chats.index');
Route::post('/user/friends/chat/send', [MessagesController::class, 'sendMessage'])->name('chats.send');
Route::delete('user/friends', [FriendsController::class, 'removeFriend'])->name('friends.remove');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
