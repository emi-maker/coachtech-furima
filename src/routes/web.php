<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MypageController;
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

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{id}', [ItemController::class, 'show']);


/*
|--------------------------------------------------------------------------
| Auth Routes（ログイン後だけ）
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/sell', [ItemController::class, 'create']);
    Route::post('/sell', [ItemController::class, 'store']);

    Route::post('/items/{item}/favorite',
    [ItemController::class, 'toggleFavorite']
    )->name('items.favorite');

    Route::post('/items/{item}/comments',
    [CommentController::class, 'store']
    )->name('comments.store');

   // マイページ
    Route::get('/mypage', [MypageController::class, 'index'])
    ->name('mypage');

    // 編集画面表示
    Route::get('/mypage/profile', [MypageController::class, 'edit'])
    ->name('mypage.profile.edit');

    // 更新処理
    Route::patch('/mypage/profile', [MypageController::class, 'update'])
    ->name('mypage.profile.update');
});