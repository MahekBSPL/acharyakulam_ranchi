<?php

use App\Models\Admin\Circular;
use App\Models\Admin\Procedure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\admin\RuleController;
use App\Http\Controllers\Admin\YogaController;
use App\Http\Controllers\Admin\EventController;

use App\Http\Controllers\admin\PopupController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\admin\WinnerController;
use App\Http\Controllers\admin\SectionController;

use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\CircularController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\admin\ClassNameController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProcedureController;
use App\Http\Controllers\admin\ProspectusController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\frontend\GalleryController;
use App\Http\Controllers\admin\AjaxRequestController;
use App\Http\Controllers\admin\HomeGalleryController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProcedureFeeController;
use App\Http\Controllers\frontend\AcademicsController;
use App\Http\Controllers\frontend\AdmissionController;
use App\Http\Controllers\Admin\ParticipationController;
use App\Http\Controllers\admin\TopperStudentController;
use App\Http\Controllers\Admin\FacilitySliderController;
use App\Http\Controllers\admin\StudentCouncilController;
use App\Http\Controllers\Admin\CompetitiveExamController;
use App\Http\Controllers\frontend\ToarchBearersController;
use App\Http\Controllers\admin\PhotoGallery as photoGallery;
use App\Http\Controllers\Admin\FacilityDescriptionController;
use App\Http\Controllers\admin\TopperStudentImagesController;
use App\Http\Controllers\Admin\ProcedureDescriptionController;

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

Route::get('/frontend/index', [IndexController::class, 'index']);

Route::get('/frontend/introduction', [IndexController::class, 'introduction']);
Route::get('/frontend/mission-vision', [IndexController::class, 'mission_vision']);
Route::get('/frontend/staff', [IndexController::class, 'staff']);
Route::get('/frontend/message-from-swamiji', [IndexController::class, 'message_from_swamiji']);
Route::get('/frontend/message-from-acharyaji', [IndexController::class, 'message_from_acharyaji']);
Route::get('/frontend/message-from-the-principal', [IndexController::class, 'message_from_the_principal']);
Route::get('/frontend/message-from-chief', [IndexController::class, 'message_from_chief']);
Route::get('/frontend/yogrishi-swami-ramdev-ji', [IndexController::class, 'yogrishi_swami_ramdev_ji']);
Route::get('/frontend/acharya-balkrishna-ji', [IndexController::class, 'acharya_balkrishna_ji']);
Route::get('/frontend/procedure', [IndexController::class, 'procedure']);
Route::get('/frontend/rules', [IndexController::class, 'rules']);
Route::get('/frontend/prospectus', [IndexController::class, 'prospectus']);
Route::get('/frontend/council', [IndexController::class, 'council']);
Route::get('/frontend/Careers', [IndexController::class, 'Careers']);
Route::get('/frontend/contact-us', [IndexController::class, 'contact_us']);
Route::post('/frontend/contactsave', [IndexController::class, 'contactsave'])->name('contactsave');

Route::get('/frontend/topper-student', [IndexController::class, 'topper_student']);
Route::get('/frontend/academics', [IndexController::class, 'academics']);
Route::get('/frontend/competitive-exam', [IndexController::class, 'competitive_exam']);

Route::get('/frontend/yoga', [IndexController::class, 'yoga']);
Route::get('/frontend/gallery', [IndexController::class, 'gallery']);
Route::get('/frontend/image-gallery-2022-2023', [IndexController::class, 'image_gallery_2022_2023']);
Route::get('/frontend/image-gallery-2023-2024', [IndexController::class, 'image_gallery_2023_2024']);
Route::get('/frontend/media', [IndexController::class, 'media']);
Route::get('/frontend/facility', [IndexController::class, 'facility']);
Route::get('/frontend/circular', [IndexController::class, 'circular']);
Route::get('/frontend/competitive_exam_details/{id}', [IndexController::class, 'competitive_exam_details']);

Route::get('/frontend/photo_gallery_details/{id}', [IndexController::class, 'photo_gallery_details']);
Route::get('/frontend/sub_photo_gallery/{id}', [IndexController::class, 'sub_photo_gallery']);


Auth::routes();

//Route::get('/login', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('login');
//  //Route::post('login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
//Route::view('/admin/dashboard','admin.dashboard')->name('admin.dashboard');
//Route::post('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('login');

Route::post('login', [DashboardController::class, 'check'])->name('login');
Route::middleware(['auth', 'IsAdmin'])->group(function () {
    Route::view('admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::resource('/admin/menu', MenuController::class);
    Route::resource('/admin/slider', SliderController::class);
    Route::resource('/admin/notification', NotificationController::class);
    Route::resource('/admin/participation', ParticipationController::class);
    Route::resource('/admin/competitive_exam', CompetitiveExamController::class);
    Route::resource('/admin/academic', AcademicController::class);
    Route::resource('/admin/facility', FacilityController::class);
    Route::resource('/admin/facilitydescription', FacilityDescriptionController::class);
    Route::resource('/admin/facilityslider', FacilitySliderController::class);
    Route::resource('/admin/procedure', ProcedureController::class);
    Route::resource('/admin/procedurefee', ProcedureFeeController::class);
    Route::resource('/admin/proceduredescription', ProcedureDescriptionController::class);
    Route::resource('/admin/yoga', YogaController::class);
    Route::resource('/admin/event', EventController::class);
    Route::resource('/admin/circular', CircularController::class);
    Route::resource('/admin/photoGallery', photoGallery::class);
    Route::any('/admin/update_rules_orders', [AjaxRequestController::class, 'update_rules_orders'])->name('/admin/update_rules_orders');
    Route::any('/admin/update_gallery_orders', [AjaxRequestController::class, 'update_gallery_orders'])->name('/admin/update_gallery_orders');
    Route::any('/admin/update_slider_orders', [AjaxRequestController::class, 'update_slider_orders'])->name('/admin/update_slider_orders');

    Route::any('/admin/update_facilty_slider_orders', [AjaxRequestController::class, 'update_facilty_slider_orders'])->name('/admin/update_facilty_slider_orders');
    Route::any('/admin/update_winner_orders', [AjaxRequestController::class, 'update_winner_orders'])->name('/admin/update_winner_orders');
    Route::any('/admin/update_home_gallery_orders', [AjaxRequestController::class, 'update_home_gallery_orders'])->name('/admin/update_home_gallery_orders');
    Route::any('/admin/update_yoga_orders', [AjaxRequestController::class, 'update_yoga_orders'])->name('/admin/update_yoga_orders');
    Route::resource('/admin/rule', RuleController::class);
    Route::resource('/admin/council', StudentCouncilController::class);
    Route::resource('/admin/class', ClassNameController::class);
    Route::resource('/admin/section', SectionController::class);
    Route::resource('/admin/winner', WinnerController::class);

    Route::resource('/admin/popup', PopupController::class);
    Route::resource('/admin/prospectus', ProspectusController::class);
    Route::resource('/admin/homegallery', HomeGalleryController::class);
    Route::resource('/admin/topperstudent', TopperStudentController::class);
    Route::any('/student_image/delete/{id}', [TopperStudentImagesController::class,'delete_image']);
    Route::any('/student_image/update_image/', [TopperStudentImagesController::class,'update_image']);

    Route::any('/admin/delete_images', [AjaxRequestController::class, 'delete_images'])->name('/admin/delete_images');
});

