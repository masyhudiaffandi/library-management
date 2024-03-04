<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublihserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('admin', function () {
        return view('admin.admin');
    });
    Route::resource('author', AuthorController::class);
    Route::resource('publisher', PublihserController::class);
    Route::resource('book', BookController::class);
    Route::resource('dashboard', AnalyticsController::class);
    Route::get('admin/author', [AuthorController::class, 'index']);
    Route::get('admin/publisher', [PublihserController::class, 'index']);
    Route::get('admin/book', [BookController::class, 'index']);
    Route::get('/', [AnalyticsController::class, 'index']);
});

require __DIR__.'/auth.php';
