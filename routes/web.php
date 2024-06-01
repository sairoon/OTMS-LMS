<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\CourseController;

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

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/about-us', [WebsiteController::class, 'about'])->name('about');
Route::get('/all-courses', [WebsiteController::class, 'course'])->name('course');
Route::get('/courses-detail', [WebsiteController::class, 'detail'])->name('course-detail');
Route::get('/contact-us', [WebsiteController::class, 'contact'])->name('contact');
Route::get('/user-login', [WebsiteController::class, 'login'])->name('user-login');
Route::get('/user-registration', [WebsiteController::class, 'registration'])->name('user-registration');

Route::middleware(['teacher'])->group(function () {

    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
    Route::post('/teacher/logout', [TeacherDashboardController::class, 'logout'])->name('teacher.logout');

    Route::resource('course', CourseController::class);


});



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/category/new', [CategoryController::class, 'create'])->name('category.new');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::resource('teacher', TeacherController::class);
});
