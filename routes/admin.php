<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::match(['get', 'post'],'/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [App\Http\Controllers\Admin\LogoutController::class, 'perform'])->name('admin.logout');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'show'])->name('admin.home');
        Route::resource('news', App\Http\Controllers\Admin\NewsController::class, ['names' => 'admin.news']);
    });
});
