<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\PurchaseController;
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

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/', [ItemController::class, 'index']);
Route::get('/items/{item}', [ItemController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Auth Routes（ログイン後だけ）
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/sell', [ItemController::class, 'create']);
    Route::post('/sell', [ItemController::class, 'store']);

    Route::post('/items/{item}/favorite',
    [ItemController::class, 'toggleFavorite']);

    Route::post('/items/{item}/comments',
    [CommentController::class, 'store']
    );

   // マイページ
    Route::get('/mypage', [MypageController::class, 'index'])
    ->name('mypage');

    // 編集画面表示
    Route::get('/mypage/profile', [MypageController::class, 'edit'])
    ->name('mypage.profile.edit');

    // 更新処理
    Route::patch('/mypage/update', [MypageController::class, 'update']);

    // 購入画面表示
    Route::get('/purchase/{item}', [PurchaseController::class, 'create'])->name('purchase.create');

    Route::post('/purchase', [PurchaseController::class, 'store']);


    //住所・変更
    Route::patch('/purchase/{item}/address', [PurchaseController::class, 'updateAddress']);

});