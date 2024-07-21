<?php

use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaAndSuggestionController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\User\IdeaAndSuggestionController as UserIdeaAndSuggestionController;
use App\Http\Controllers\NidController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestController as ControllersRequestController;
use App\Http\Controllers\User\RequestController;
use App\Http\Controllers\SmsSettingController;
use App\Http\Controllers\User\DocumentController as UserDocumentController;
use App\Http\Controllers\UserController;
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


Route::get('/', [AuthContoller::class, 'index'])->name('login.index');
// Route::get('/', [AuthContoller::class, 'index'])->name('home');
Route::post('login', [AuthContoller::class, 'authenticate'])->name('login');
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::get('mobile-verify', [RegisterController::class, 'mobileVerify'])->name('mobile.verify.index');
Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::post('mobile-verify', [RegisterController::class, 'verify'])->name('mobile.verify');
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
        Route::post('update', [ProfileController::class, 'update'])->name('admin.profile.update');

        Route::prefix('users')->group(function () {
            Route::get('add', [UserController::class, 'create'])->name('admin.users.add');
            Route::post('store', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('edit', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::get('invite', [UserController::class, 'invite'])->name('admin.users.invite');
            Route::post('update', [UserController::class, 'update'])->name('admin.users.update');
            Route::get('manage', [UserController::class, 'index'])->name('admin.users.manage');
            Route::post('delete', [UserController::class, 'delete'])->name('admin.users.delete');
        });
        Route::prefix('invoice')->group(function () {
            Route::get('add', [InvoiceController::class, 'create'])->name('admin.invoice.add');
            Route::post('store', [InvoiceController::class, 'store'])->name('admin.invoice.store');
            Route::get('edit', [InvoiceController::class, 'edit'])->name('admin.invoice.edit');
            Route::post('update', [InvoiceController::class, 'update'])->name('admin.invoice.update');
            Route::get('manage', [InvoiceController::class, 'index'])->name('admin.invoice.manage');
            Route::post('delete', [InvoiceController::class, 'delete'])->name('admin.invoice.delete');
            Route::get('template', [InvoiceController::class, 'template'])->name('admin.invoice.template');
            Route::get('print', [InvoiceController::class, 'print'])->name('admin.invoice.print');
            Route::post('search', [InvoiceController::class, 'search'])->name('admin.invoice.search');
            Route::post('multiple-prtint', [InvoiceController::class, 'multiplePrint'])->name('admin.invoice.multi-print');
        });
    });
    Route::prefix('user')->middleware('user')->group(function () {
        Route::get('profile', [ProfileController::class, 'index'])->name('user.profile');
        Route::post('update', [ProfileController::class, 'update'])->name('user.profile.update');
    });
    Route::get('sign-out', [AuthContoller::class, 'logout'])->name('singout');
});
