<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\frontend\ToarchBearersController;
use App\Http\Controllers\frontend\AdmissionController;
use App\Http\Controllers\frontend\AcademicsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\admin\PhotoGallery as photoGallery;
use App\Http\Controllers\admin\AjaxRequestController;

//use App\http\Controllers\Admin\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/frontend/index',[IndexController::class,'index']);
Route::get('/frontend/introduction', [AboutUsController::class, 'introduction']);
Route::get('/frontend/mission-vision', [AboutUsController::class, 'mission_vision']);
Route::get('/frontend/staff', [AboutUsController::class, 'staff']);
Route::get('/frontend/message-from-swamiji', [AboutUsController::class, 'message_from_swamiji']);
Route::get('/frontend/message-from-acharyaji', [AboutUsController::class, 'message_from_acharyaji']);
Route::get('/frontend/message-from-the-principal', [AboutUsController::class, 'message_from_the_principal']);
Route::get('/frontend/message-from-chief', [AboutUsController::class, 'message_from_chief']);

Route::get('/frontend/yogrishi-swami-ramdev-ji', [ToarchBearersController::class, 'yogrishi_swami_ramdev_ji']);
Route::get('/frontend/acharya-balkrishna-ji', [ToarchBearersController::class, 'acharya_balkrishna_ji']);

Route::get('/frontend/procedure', [AdmissionController::class, 'procedure']);
Route::get('/frontend/rules', [AdmissionController::class, 'rules']);
Route::get('/frontend/prospectus', [AdmissionController::class, 'prospectus']);

Route::get('/frontend/council', [AcademicsController::class, 'council']);
Route::get('/frontend/topper-student', [AcademicsController::class, 'topper_student']);
Route::get('/frontend/academics', [AcademicsController::class, 'academics']);
Route::get('/frontend/competitive-exam', [AcademicsController::class, 'competitive_exam']);
Route::get('/frontend/competitive-exam-2022-2023', [AcademicsController::class, 'competitive_exam_2022_2023']);
Route::get('/frontend/competitive-exam-2023-2024', [AcademicsController::class, 'competitive_exam_2023_2024']);
Route::get('/frontend/yoga', [AcademicsController::class, 'yoga']);

Auth::routes();

//Route::get('/login', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('login');
//  //Route::post('login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
//Route::view('/admin/dashboard','admin.dashboard')->name('admin.dashboard');
//Route::post('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('login');

Route::post('login', [DashboardController::class, 'check'])->name('login');
Route::middleware(['auth','IsAdmin'])->group(function () {
    Route::view('admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::resource('/admin/menu',MenuController::class);
    Route::resource('/admin/slider',SliderController::class);
    //Route::post('/addslider', [SliderController::class, 'store'])->name('addslider');
    Route::resource('/admin/notification',NotificationController::class);
    Route::resource('/admin/event',EventController::class);
    Route::resource('/admin/photoGallery', photoGallery::class);
    Route::any('/admin/delete_images', [AjaxRequestController::class,'delete_images'])->name('/admin/delete_images');
});

