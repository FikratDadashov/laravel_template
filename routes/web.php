<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/home', function () {
    return view('admin.home');
})->middleware(['auth'])->name('admin');

require __DIR__.'/auth.php';

//Route::get('/admin', function () {
//    return view('admin/auth.login');
//})->name('login');


//Route::get('admin', [LoginController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {



//Language
Route::get('admin/language', [LanguageController::class, 'index']);
Route::get('admin/language/create', [LanguageController::class, 'create']);
Route::post('admin/language/store', [LanguageController::class, 'store']);
Route::delete('admin/language/{id}', [LanguageController::class, 'destroy']);
Route::get('admin/language/{id}/default', [LanguageController::class, 'default']);
Route::get('admin/language/edit/{id}', [LanguageController::class, 'edit']);
Route::put('admin/language/update/{id}', [LanguageController::class, 'update']);

// Slide
Route::get('admin/slide', [SlideController::class, 'index']);
Route::get('admin/slide/create', [SlideController::class, 'create']);
Route::post('admin/slide', [SlideController::class, 'store']);
Route::get('admin/slide/{id}/edit', [SlideController::class, 'edit']);
Route::put('admin/slide/{id}/update', [SlideController::class, 'update']);
Route::get('admin/slide/{id}/edit/{language_id}', [SlideController::class, 'edit_text']);
Route::put('admin/slide/{id}/update/{language_id}', [SlideController::class, 'update_text']);
Route::delete('admin/slide/{id}/', [SlideController::class, 'destroy']);

// Blog
Route::get('admin/blog', [BlogController::class, 'index']);
Route::get('admin/blog/create', [BlogController::class, 'create']);
Route::post('admin/blog', [BlogController::class, 'store']);
Route::get('admin/blog/{id}/edit', [BlogController::class, 'edit']);
Route::put('admin/blog/{id}/update', [BlogController::class, 'update']);
Route::get('admin/blog/{id}/edit/{language_id}', [BlogController::class, 'edit_text']);
Route::put('admin/blog/{id}/update/{language_id}', [BlogController::class, 'update_text']);
Route::delete('admin/blog/{id}/', [BlogController::class, 'destroy']);

//User
Route::get('admin/user', [UserController::class, 'index']);
Route::get('admin/user/create', [UserController::class, 'create']);
Route::post('admin/user', [UserController::class, 'store']);
Route::get('admin/user/{id}/edit', [UserController::class, 'edit']);
Route::put('admin/user/{id}', [UserController::class, 'update']);
Route::delete('admin/user/{id}', [UserController::class, 'destroy']);

// Service
Route::get('admin/service', [ServiceController::class, 'index']);
Route::get('admin/service/create', [ServiceController::class, 'create']);
Route::post('admin/service', [ServiceController::class, 'store']);
Route::get('admin/service/{id}/edit', [ServiceController::class, 'edit']);
Route::put('admin/service/{id}/update', [ServiceController::class, 'update']);
Route::get('admin/service/{id}/edit/{language_id}', [ServiceController::class, 'edit_text']);
Route::put('admin/service/{id}/update/{language_id}', [ServiceController::class, 'update_text']);
Route::delete('admin/service/{id}/', [ServiceController::class, 'destroy']);

//Setting
Route::get('admin/setting', [SettingController::class, 'index']);
Route::get('admin/setting/{id}/edit', [SettingController::class, 'edit']);
Route::put('admin/setting/{id}/update', [SettingController::class, 'update']);
Route::get('admin/setting/{id}/edit/{language_id}', [SettingController::class, 'edit_text']);
Route::put('admin/setting/{id}/update/{language_id}', [SettingController::class, 'update_text']);


//Contact
Route::get('admin/contact', [ContactController::class, 'index']);
Route::get('admin/contact/edit/{id}', [ContactController::class, 'edit']);
Route::put('admin/contact/{id}/update', [ContactController::class, 'update']);
Route::get('admin/contact/{id}/edit/{language_id}', [ContactController::class, 'edit_text']);
Route::put('admin/contact/{id}/update/{language_id}', [ContactController::class, 'update_text']);

// Testimonial
Route::get('admin/testimonial', [TestimonialController::class, 'index']);
Route::get('admin/testimonial/create', [TestimonialController::class, 'create']);
Route::post('admin/testimonial', [TestimonialController::class, 'store']);
Route::get('admin/testimonial/{id}/edit', [TestimonialController::class, 'edit']);
Route::put('admin/testimonial/{id}/update', [TestimonialController::class, 'update']);
Route::get('admin/testimonial/{id}/edit/{language_id}', [TestimonialController::class, 'edit_text']);
Route::put('admin/testimonial/{id}/update/{language_id}', [TestimonialController::class, 'update_text']);
Route::delete('admin/testimonial/{id}/', [TestimonialController::class, 'destroy']);



});

