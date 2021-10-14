<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// テスト用
use App\Http\Controllers\ScrapingController;
use App\Http\Controllers\LookForUpdateController;
use App\Http\Controllers\SendEmailController;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// テスト用のルーティング
Route::get('/scraping', [ScrapingController::class, 'scraping']);
Route::get('/lookforupdate', [LookForUpdateController::class, 'lookForUpdate']);
Route::get('/sendemail', [SendEmailController::class, 'sendEmail']);
