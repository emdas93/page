<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Name 규칙은 컨트롤러이름.함수

/* 홈 */
Route::get('/', [HomeController::class, 'index'])->name('home.index');

/* 게시판 */
Route::get('/board/index/{boardId?}', [BoardController::class, 'index'])->name('board.index');
Route::get('/board/index/{boardId?}/{pageNo?}', [BoardController::class, 'index'])->name('board.index');
Route::get('/board/post/{boardId}/{pageNo}/{postId}', [BoardController::class, 'postView'])->name('board.postView');

/* 유저 페이지 */
Route::get('/user/login', [UserController::class, 'loginView'])->name('user.loginView');
Route::get('/user/register', [UserController::class, 'registerView'])->name('user.registerView');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user/info', [UserController::class, 'infoView'])->name('user.infoView');