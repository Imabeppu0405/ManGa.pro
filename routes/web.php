<?php

use App\Http\Controllers\Api\SteamApiController;
use App\Http\Controllers\Api\TranslationApiController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReportController;
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

Route::view('/', 'welcome');

Route::view('/dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    // ゲーム一覧画面
    Route::get('/home', [GameController::class, 'index'])->name('home');
    // ゲーム詳細画面
    Route::get('/show/{id}', [GameController::class, 'show'])->name('game.show');
    // ゲームNews取得
    Route::post('/api/getNews', [SteamApiController::class, 'getNews'])->name('getNews');
    // 翻訳
    Route::post('/api/translate', [TranslationApiController::class, 'translate'])->name('translate');
    // ゲーム管理画面
    Route::get('/mst/game', [GameController::class, 'mstIndex'])->name('mst/game');
    // ゲーム保存
    Route::post('/mst/game/save', [GameController::class, 'save']);
    // ゲーム削除処理
    Route::post('/mst/game/delete', [GameController::class, 'delete']);
    // アカウント画面
    Route::get('/account', [ReportController::class, 'index'])->name('account');
    // ゲーム記録保存
    Route::post('/report/save', [ReportController::class, 'save']);
    // ゲーム記録削除
    Route::post('/report/delete', [ReportController::class, 'delete']);
});

require __DIR__.'/auth.php';
