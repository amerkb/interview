<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'IsAdmin']], function ($router) {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::resource('blog', BlogController::class)->except(['edit', 'update'])
        ->names([
            'index' => 'admin.blog.index',
            'create' => 'admin.blog.create',
            'store' => 'admin.blog.store',
            'show' => 'admin.blog.show',
            'destroy' => 'admin.blog.destroy',
        ]);
    Route::get('reset_password', [AuthController::class, 'reset_view'])->name('reset.view');
    Route::post('reset_password', [AuthController::class, 'reset'])->name('reset.post');


});
