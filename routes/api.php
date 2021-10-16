<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostRegisterUserController;
use App\Http\Controllers\Api\UserGetController;
use App\Http\Controllers\Api\GetConstantWordController;
use App\Http\Controllers\Api\GetInterestWordController;
use App\Http\Controllers\Api\PostInterestWordController;
use App\Http\Controllers\Api\GetDataToSendController;


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

//ユーザー登録
Route::post('/register_user', [PostRegisterUserController::class, 'registerUser']);

// ユーザー情報の取得
Route::middleware('auth:api')->get('/user', [UserGetController::class, 'userGet']);

// ログイン処理
Route::post('/login', [AuthController::class, 'login']);

// マスタデータの取得
Route::middleware('auth:api')->get('/get_constant_word', [GetConstantWordController::class, 'getConstantWord']);

// 興味のあるワードの登録
Route::middleware('auth:api')->post('/post_word', [PostInterestWordController::class, 'postInterestWord']);

// 登録ワードの取得
Route::middleware('auth:api')->get('/get_word', [GetInterestWordController::class, 'getInterestWord']);

// 更新情報の取得
Route::middleware('auth:api')->get('/get_data_to_send', [GetDataToSendController::class, 'getDataToSend']);

