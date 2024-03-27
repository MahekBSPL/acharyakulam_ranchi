<?php

namespace App\Http\Controllers\frontend;

use App\Models\Admin\Menu;
use App\Models\Admin\Yoga;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Models\Admin\Notification;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Participation;
use App\Http\Controllers\Controller;
use App\Models\Admin\CompetitiveExam;
use App\Models\Admin\FacilityDescription;
use App\Models\Admin\FacilitySlider;
use App\Models\Admin\Procedure;
use App\Models\Admin\ProcedureDescription;
use App\Models\Admin\ProcedureFee;

class IndexController extends Controller
{
    //
    public function index()
    {
        //$list = Slider::orderBy('id', 'desc')->select('*');
        // $slider =  Slider::orderBy('slider_postion', 'ASC')->get();
        $title = "index";
        $sliders = Slider::all();
        $notifications = Notification::where('status', 2)->where('language', 1)->get();
        return view('frontend/index', compact('title', 'sliders', 'notifications'));
        // $menuparents = Menu::with('subMenu')
        //                     ->where('status',2)
        //                     ->where('menu_position',1)
        //                     ->where('menu_category', 1)
        //                     ->get();
        //return view('frontend/index', compact('title','sliders','notifications','menuparents'));
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
        return view('frontend.rules');
    }

    public function prospectus()
    {
        return view('frontend.prospectus');
    }
    public function council()
    {
        return view('frontend/council');
    }

    public function topper_student()
    {
        return view('frontend/topper-student');
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

    public function competitive_exam_2022_2023()
    {
         $participation = Participation::all();
         $competitiveExam = CompetitiveExam::where('selectyear','3')->get();
        return view('frontend/competitive-exam-2022-2023', compact('competitiveExam'));
    }

    public function competitive_exam_2023_2024()
    {
        $competitiveExam = CompetitiveExam::where('selectyear','4')->get();
        return view('frontend/competitive-exam-2023-2024', compact('competitiveExam'));
    }

    public function yoga()
    {
        $yogas = Yoga::all();
        return view('frontend/yoga', compact('yogas'));
    }

    public function gallery()
    {
        return view('frontend/gallery');
    }

    public function media()
    {
        return view('frontend/media');
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
        $facilitySliders = FacilitySlider::all();
        $facilityDescriptions = FacilityDescription::all();
        return view('frontend/facility',compact('facilitySliders','facilityDescriptions'));
    }

    public function circular()
    {
        return view('frontend/circular');
    }

}