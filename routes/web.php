<?php


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
/*نمایش صفحه اصلی یا خانه*/
Route::get('/', [\App\Http\Controllers\QuestionController::class , 'index']);
/*نمایش صفحه واریز*/
Route::get('/bank', [\App\Http\Controllers\WalletController::class , 'index_buy'])->middleware('auth');
/*انجام عملیات واریز به کیف پول*/
Route::patch('/bank', [\App\Http\Controllers\WalletController::class , 'deposit']);
/*نمایش خصوصی سوال که مخصوص خود کاربر فروشنده هست*/
Route::get('/questions/{id}', [\App\Http\Controllers\QuestionController::class , 'show_private'])->middleware('auth');
/*نمایش عمومی سوال برای کاربر خریدار*/
Route::get('/question/{id}', [\App\Http\Controllers\QuestionController::class , 'show_public']);
/*افزودن کامنت به جدول*/
Route::post('/question/{id}', [\App\Http\Controllers\CommentController::class , 'create_comment'])->middleware('auth');
/*صفحه تایید خرید*/
Route::get('/buy/{id}', [\App\Http\Controllers\QuestionController::class , 'confirm_buy'])->middleware('auth');
/*انجام عملیات خرید و جابه جا کردن مبلغ خرید و...*/
Route::post('/buy/{id}', [\App\Http\Controllers\WalletController::class , 'make_buy']);
/*جستجو از طرق انتخاب دسته های مختلف از منو*/
Route::get('/{value}/{key}', [\App\Http\Controllers\SearchController::class , 'nav_search']);
/*جستجو از طریق عنوان سوال*/
Route::post('/title', [\App\Http\Controllers\SearchController::class , 'input_search']);
/*پنل خریدار*/
Route::get('/panel_buy', [\App\Http\Controllers\QuestionController::class , 'show_panel_buy'])->name('panel_buy')->middleware('auth');
/*پنل فروشنده*/
Route::get('/panel_sell', [\App\Http\Controllers\QuestionController::class , 'show_panel_sell'])->name('panel_sell')->middleware('auth');
/*صفحه افزودن سوال*/
Route::get('/createquiz', [\App\Http\Controllers\QuestionController::class , 'create_quiz'])->name('createquiz')->middleware('auth');
/*ذخیره کردن سوال*/
Route::post('/createquiz', [\App\Http\Controllers\QuestionController::class , 'store_quiz'])->name('createquiz')->middleware('auth');
/*انجام ویرایش و آپدیت سوال*/
Route::patch('/questions/{id}/edit', [\App\Http\Controllers\QuestionController::class , 'update_quiz'])->middleware('auth');
/*صفحه ویرایش سوال*/
Route::get('/questions/{id}/edit', [\App\Http\Controllers\QuestionController::class , 'edit_quiz'])->middleware('auth');
/*دلیت کردن سوال*/
Route::delete('/questions/{id}', [\App\Http\Controllers\QuestionController::class , 'destroy_quiz'])->middleware('auth');
/*صفحه برداشت از کیف پول*/
Route::get('/bank_info', [\App\Http\Controllers\WalletController::class , 'index_sell'])->name('bank_info')->middleware('auth');
/*انجام عملیات برداشت از کیف پول و واریز به حساب*/
Route::patch('/bank_info', [\App\Http\Controllers\WalletController::class , 'withdraw'])->name('bank_info')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
