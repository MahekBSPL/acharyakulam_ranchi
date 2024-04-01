<?php

namespace App\Http\Controllers\frontend;

use App\Models\Admin\Menu;
use App\Models\Admin\Yoga;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Models\Admin\Circular;
use App\Models\Admin\Facility;
use App\Models\Admin\Procedure;
use App\Models\Admin\Prospectu;
use App\Models\Admin\Notification;
use App\Models\Admin\ProcedureFee;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Participation;
use App\Http\Controllers\Controller;
use App\Models\Admin\FacilitySlider;
use App\Models\Admin\StudentCouncil;
use App\Models\Admin\CompetitiveExam;
use App\Models\Admin\FacilityDescription;
use App\Models\Admin\ProcedureDescription;
use App\Models\Admin\PhotoGallery;
use App\Models\Admin\PhotoCategory;
use App\Models\Admin\Rule;
use App\Models\Admin\TopperStudent;
use App\Models\Admin\TopperStudentImage;
use App\Models\Admin\HomeGallery;
use App\Models\Admin\Winner;

class IndexController extends Controller
{
    //
    public function index()
    {
        //$list = Slider::orderBy('id', 'desc')->select('*');
        // $slider =  Slider::orderBy('slider_postion', 'ASC')->get();
        $title = "index";
        $sliders = Slider::all();
        $today=date('Y-m-d');
        $notifications = Notification::where('status', 2)->where('language', 1)->where('startdate', '<=', $today)->where('enddate', '>=', $today)->get();
        $home_gallery=HomeGallery::orderBy('order','ASC')->get();
        return view('frontend/index', compact('title', 'sliders', 'notifications','home_gallery'));
        // $menuparents = Menu::with('subMenu')
        //                     ->where('status',2)
        //                     ->where('menu_position',1)
        //                     ->where('menu_category', 1)
        //                     ->get();
        //return view('frontend/index', compact('title','sliders','notifications','menuparents'));
    }
    public function winner()
    {
        $winner = Winner::orderBy('order', 'asc')->get();
        return view('frontend.winner-student',compact('winner'));
    }
    public function introduction()
    {
        return view('frontend.introduction');
    }

    public function mission_vision()
    {
        return view('frontend.mission-vision');
    }

    public function staff()
    {
        return view('frontend.staff');
    }

    public function message_from_swamiji()
    {
        return view('frontend.message-from-swamiji');
    }

    public function message_from_acharyaji()
    {
        return view('frontend.message-from-acharyaji');
    }

    public function message_from_the_principal()
    {
        return view('frontend.message-from-the-principal');
    }

    public function message_from_chief()
    {
        return view('frontend.message-from-chief');
    }

    public function yogrishi_swami_ramdev_ji()
    {
        return view('frontend.yogrishi-swami-ramdev-ji');
    }

    public function acharya_balkrishna_ji()
    {
        return view('frontend.acharya-balkrishna-ji');
    }

    public function procedure()
    {
        $procedures = Procedure::all();
        $procedureFees = ProcedureFee::all();
        $procedureDescriptions = ProcedureDescription::all();
        return view('frontend.procedure', compact('procedures','procedureFees','procedureDescriptions'));
    }

    public function rules()
    {
        $rules = Rule::all();
        return view('frontend.rules',compact('rules'));
    }

    public function prospectus()
    {
        $prospectuss = Prospectu::all();
        return view('frontend.prospectus', compact('prospectuss'));
    }
    public function council()
    {
        $councils = StudentCouncil::all();
        return view('frontend/council', compact('councils'));
    }

    public function topper_student()
    {
        $result = TopperStudent::all();
        return view('frontend/topper-student',compact('result'));
    }

    public function academics()
    {
        return view('frontend/academics');
    }

    public function competitive_exam()
    {
        $menuData = getMenuData();
        $participations = Participation::all();

        return view('frontend/competitive-exam', compact('participations', 'menuData'));
    }

  
    public function competitive_exam_details($id)
    {
        $competitiveExam = CompetitiveExam::where('selectyear',$id)->get();
        $participation = Participation::where('id',$id)->first();
        return view('frontend/competitive_exam_details',compact('competitiveExam','participation'));
    }

    public function yoga()
    {
        $yogas = Yoga::all();
        return view('frontend/yoga', compact('yogas'));
    }

    public function gallery()
    {
        $photocategory_data =  PhotoCategory::where('parent_id', 0)->orderBy('cat_postion', 'ASC')->get();
        return view('frontend/gallery',compact('photocategory_data'));
    }
    public function sub_photo_gallery($parent_id){
        $data='';
        $photocategory_data=  PhotoCategory::where('parent_id', $parent_id)->get();
        $title_data=  PhotoCategory::where('id', $parent_id)->get()->first();  
        $cat_descriptions=$title_data->cat_descriptions;
        $title = $title_data->title; 
        return response()->view("frontend/gallery", compact('title','data','cat_descriptions','photocategory_data'));
    }
    public function photo_gallery_details($event_id){
        $photoCategory = PhotoCategory::find($event_id);
        $cat_descriptions=$photoCategory->cat_descriptions;
        $title=$photoCategory->title;
        $photoGallery = PhotoGallery::where('event_id', $event_id)->orderBy('img_postion', 'ASC')->get();
        // echo "<pre>";
        // print_r($photoGallery);
        // echo "</pre>";
        // exit;
      //  $title="Photo Gallery:Annual Function";
        return response()->view("frontend/photo_gallery_details", compact('title','photoGallery','cat_descriptions'));
    }
    public function media()
    {
        $today=date('Y-m-d');
        $medias = Notification::where('status', 2)->where('language', 1)->where('notificationtype', 3)->where('startdate', '<=', $today)->where('enddate', '>=', $today)->get();
        return view('frontend/media', compact('medias'));
    }

    public function image_gallery_2022_2023()
    {
        return view('frontend/image-gallery-2022-2023');
    }

    public function image_gallery_2023_2024()
    {
        return view('frontend/image-gallery-2023-2024');
    }

    public function facility()
    {
        $facilitys = Facility::all();
        $facilitySliders = FacilitySlider::all();
        $facilityDescriptions = FacilityDescription::all();
        return view('frontend/facility',compact('facilitys', 'facilitySliders','facilityDescriptions'));
    }

    public function circular()
    {
        $circulars = Circular::all();
        return view('frontend/circular', compact('circulars'));
    }

}