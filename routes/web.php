<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/sitemap.xml', [PortfolioController::class, 'sitemap'])->name('sitemap');

Route::group(['middleware' => ['web']], function () {
    Route::get('/admin', [AdminController::class, 'show'])->name('admin');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/admin/upload-cv', [AdminController::class, 'uploadCv'])->name('admin.upload-cv');
    Route::post('/admin/upload-screenshot', [AdminController::class, 'uploadScreenshot'])->name('admin.upload-screenshot');
    Route::post('/admin/deploy', [AdminController::class, 'deploy'])->name('admin.deploy');
});
