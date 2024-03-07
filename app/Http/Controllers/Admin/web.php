<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\themes\HomeController  as home;
use App\Http\Controllers\admin\MenuController as menu;
use App\Http\Controllers\admin\SliderController as slider;
use App\Http\Controllers\admin\PhotoGallery as photoGallery;
use App\Http\Controllers\admin\AjaxRequestController;
use App\Http\Controllers\themes\InnerPagesController as innerpages ;
use App\Http\Controllers\admin\CircularsController as notifications ;
use App\Http\Controllers\admin\HomeworkController as homework ;
use App\Http\Controllers\admin\FacultyController as faculty ;
use App\Http\Controllers\admin\CouncilController as council ;
use App\Http\Controllers\admin\AcademicSyllabusController as syllabus ;
use App\Http\Controllers\admin\TransferCertificateController as certificate;
use App\Http\Controllers\admin\AchievementsController as achievement;
use App\Http\Controllers\admin\BirthdayController as birthday;
use App\Http\Controllers\themes\DownloadTC;
use App\Http\Controllers\admin\ResultController as result;
use App\Http\Controllers\admin\DepartmentController as department;
use App\Http\Controllers\admin\InfrastructureController as infrastructure;

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
Route::get('/', [App\Http\Controllers\themes\HomeController::class, 'index']);
Route::get('/diksha-rohan', [App\Http\Controllers\themes\HomeController::class, 'diksha_rohan'])->name('diksha-rohan');
Route::get('/photo-gallery', [App\Http\Controllers\themes\HomeController::class, 'photo_gallery'])->name('photo-gallery');
Route::get('/homework', [App\Http\Controllers\themes\HomeController::class, 'homework'])->name('homework');
Route::get('/bank_details', [App\Http\Controllers\themes\HomeController::class, 'bank_details'])->name('bank_details');
Route::get('/annual-function', [App\Http\Controllers\themes\HomeController::class, 'annual_function'])->name('annual-function');
Route::get('/introduction', [App\Http\Controllers\themes\HomeController::class, 'introduction'])->name('introduction');
Route::get('/achievers_x', [App\Http\Controllers\themes\HomeController::class, 'achievers_x'])->name('achievers-x');
Route::get('/achievers_xii', [App\Http\Controllers\themes\HomeController::class, 'achievers_xii'])->name('achievers-xii');
Route::get('/admission_document', [App\Http\Controllers\themes\HomeController::class, 'admission_document'])->name('admission_document');
Route::get('/entrance-result', [App\Http\Controllers\themes\HomeController::class, 'entrance_result'])->name('entrance-result');
Route::post('/career-save', [home::class, 'careerSave'])->name('career-save');
Route::post('/contact-save', [home::class, 'contactSave'])->name('contact-save');
Route::get('/admin/login', function () {return view('auth/login');  });
Route::any('pages/{slug}', [innerpages::class, 'index']);
Route::get('/photo_gallery_details/{id}', [home::class, 'photo_gallery_details']);
Route::get('/sub_photo_gallery/{id}', [home::class, 'sub_photo_gallery']);
Route::post('/download_transfer_certificate', [DownloadTC::class, 'download_transfer_certificate']);
Route::get('/L&T-Finance', [home::class, 'l_and_t']);
Route::post('/l_and_t-save', [home::class, 'l_and_t_save'])->name('l_and_t-save');

//for footer
Route::get('/privacy-policy', [App\Http\Controllers\themes\HomeController::class, 'privacy_policy'])->name('privacy-policy');


Auth::routes();
Route::group(['middleware' => ['auth','admin']], function () {
    Route::resource('/admin/result', result::class);
    Route::resource('/admin/department', department::class);
    Route::resource('/admin/infrastructure', infrastructure::class);
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('/admin/menu', menu::class);
    Route::any('/admin/get_primarylink_menu', [AjaxRequestController::class,'get_primarylink_menu'])->name('/admin/get_primarylink_menu');
    Route::any('/admin/get_filter', [AjaxRequestController::class,'get_filter'])->name('/admin/get_filter');
    Route::any('/admin/get_primarylink_module', [AjaxRequestController::class,'get_primarylink_module'])->name('/admin/get_primarylink_module');
    Route::any('/admin/update_menu_orders', [AjaxRequestController::class,'update_menu_orders'])->name('/admin/update_menu_orders');
    Route::any('/admin/update_galleryCat_orders', [AjaxRequestController::class,'update_galleryCat_orders'])->name('/admin/update_galleryCat_orders');
    Route::any('/admin/update_sliders_orders', [AjaxRequestController::class,'update_sliders_orders'])->name('/admin/update_sliders_orders');
    Route::any('/admin/update_department_orders', [AjaxRequestController::class,'update_department_orders'])->name('/admin/update_department_orders');
    Route::any('/Birthday/destroy/{id}', [Birthday::class, 'destroy'])->name('birthday.destroy');
    //Route::any('/Birthday/destroy/{id}', [Birthday::class,'destroy'])->name('birthday.destroy');

   Route::resource('/admin/slider', slider::class);
    Route::resource('/admin/photoGallery', photoGallery::class);
    Route::any('/admin/delete_infraimages', [AjaxRequestController::class,'delete_infraimages'])->name('/admin/delete_infraimages');

    Route::any('/admin/delete_images', [AjaxRequestController::class,'delete_images'])->name('/admin/delete_images');
    Route::resource('/admin/notifications', notifications::class); 
    Route::resource('/admin/homework', homework::class); 
    Route::resource('/admin/faculty', faculty::class); 
    Route::resource('/admin/council', council::class); 
    Route::resource('/admin/syllabus', syllabus::class); 
    Route::resource('/admin/certificate', certificate::class); 
    Route::resource('/admin/achievement', achievement::class); 
    Route::get('/admin/birthday', [birthday::class,'index'])->name('/admin/birthday');
    Route::any('/admin/birthday/store/', [birthday::class,'store'])->name('/admin/birthday/store/');
  

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
