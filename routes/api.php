<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserGetController;
use App\Http\Controllers\Api\GetInterestWordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// ユーザー情報の取得
Route::middleware('auth:api')->get('/user', [UserGetController::class, 'userGet']);

// ログイン処理
Route::post('/login', [AuthController::class, 'login']);

// 興味のあるワードの登録
Route::middleware('auth:api')->post('/post_word', [PostInterestWordController::class, 'postInterestWord']);

// 登録ワードの取得
Route::middleware('auth:api')->get('/get_word', [GetInterestWordController::class, 'getInterestWord']);

