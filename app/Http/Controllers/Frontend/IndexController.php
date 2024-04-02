<?php

namespace App\Http\Controllers\frontend;

use App\Mail\ContactMail;
use App\Models\Admin\Menu;
use App\Models\Admin\Rule;
use App\Models\Admin\Yoga;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Models\Admin\Circular;
use App\Models\Admin\Facility;
use App\Models\Admin\ContactUs;
use App\Models\Admin\Procedure;
use App\Models\Admin\Prospectu;
use App\Models\Admin\Notification;
use App\Models\Admin\PhotoGallery;
use App\Models\Admin\ProcedureFee;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Participation;
use App\Models\Admin\PhotoCategory;
use App\Models\Admin\TopperStudent;
use App\Http\Controllers\Controller;
use App\Models\Admin\FacilitySlider;
use App\Models\Admin\StudentCouncil;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\CompetitiveExam;
use App\Models\Admin\TopperStudentImage;
use App\Models\Admin\FacilityDescription;
use App\Models\Admin\Popup;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\ProcedureDescription;

use App\Models\Admin\PhotoGallery;
use App\Models\Admin\PhotoCategory;
use App\Models\Admin\Rule;
use App\Models\Admin\TopperStudent;
use App\Models\Admin\TopperStudentImage;
use App\Models\Admin\HomeGallery;
use App\Models\Admin\Winner;
use App\Models\Admin\Popup;
use App\Models\Admin\Academic;

class IndexController extends Controller
{
    //
    public function index()
    {
        //$list = Slider::orderBy('id', 'desc')->select('*');
        // $slider =  Slider::orderBy('slider_postion', 'ASC')->get();
        $title = "index";
        $sliders = Slider::all();
        $modals = Popup::all();
        $today = date('Y-m-d');
        $notifications = Notification::where('status', 2)->where('language', 1)->where('startdate', '<=', $today)->where('enddate', '>=', $today)->orderBy('created_at', 'desc')->get();
        return view('frontend/index', compact('title', 'sliders', 'modals','notifications'));
        // $menuparents = Menu::with('subMenu')

        $today=date('Y-m-d');
        $notifications = Notification::where('status', 2)->where('language', 1)->where('startdate', '<=', $today)->where('enddate', '>=', $today)->get();
        $home_gallery=HomeGallery::orderBy('order','ASC')->get();
        $popup_data=Popup::first();
        return view('frontend/index', compact('title', 'sliders', 'notifications','home_gallery','popup_data'));
        // $menuparents = Menu::with('subMenu'),

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
    public function event()
    {
       // $winner = Winner::orderBy('order', 'asc')->get();
        return view('frontend.event');
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
        return view('frontend.procedure', compact('procedures', 'procedureFees', 'procedureDescriptions'));
    }

    public function rules()
    {
        $rules = Rule::all();
        return view('frontend.rules', compact('rules'));
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
        return view('frontend/topper-student', compact('result'));
    }
    public function academics()
    {
        $result = Academic::all();
        return view('frontend/academics',compact('result'));
    }

    public function competitive_exam()
    {
        $menuData = getMenuData();
        $participations = Participation::all();

        return view('frontend/competitive-exam', compact('participations', 'menuData'));
    }


    public function competitive_exam_details($id)
    {
        $competitiveExam = CompetitiveExam::where('selectyear', $id)->get();
        $participation = Participation::where('id', $id)->first();
        return view('frontend/competitive_exam_details', compact('competitiveExam', 'participation'));
    }

    public function yoga()
    {
        $yogas = Yoga::all();
        return view('frontend/yoga', compact('yogas'));
    }

    public function gallery()
    {
        $photocategory_data =  PhotoCategory::where('parent_id', 0)->orderBy('cat_postion', 'ASC')->get();
        return view('frontend/gallery', compact('photocategory_data'));
    }
    public function sub_photo_gallery($parent_id)
    {
        $data = '';
        $photocategory_data =  PhotoCategory::where('parent_id', $parent_id)->get();
        $title_data =  PhotoCategory::where('id', $parent_id)->get()->first();
        $cat_descriptions = $title_data->cat_descriptions;
        $title = $title_data->title;
        return response()->view("frontend/gallery", compact('title', 'data', 'cat_descriptions', 'photocategory_data'));
    }
    public function photo_gallery_details($event_id)
    {
        $photoCategory = PhotoCategory::find($event_id);
        $cat_descriptions = $photoCategory->cat_descriptions;
        $title = $photoCategory->title;
        $photoGallery = PhotoGallery::where('event_id', $event_id)->orderBy('img_postion', 'ASC')->get();
        // echo "<pre>";
        // print_r($photoGallery);
        // echo "</pre>";
        // exit;
        //  $title="Photo Gallery:Annual Function";
        return response()->view("frontend/photo_gallery_details", compact('title', 'photoGallery', 'cat_descriptions'));
    }
    public function media()
    {
        $today = date('Y-m-d');
        $medias = Notification::where('status', 2)->where('language', 1)->where('notificationtype', 3)->where('startdate', '<=', $today)->where('enddate', '>=', $today)->orderBy('created_at', 'desc')->get();
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
        return view('frontend/facility', compact('facilitys', 'facilitySliders', 'facilityDescriptions'));
    }

    public function circular()
    {
        $circulars = Circular::all();
        return view('frontend/circular', compact('circulars'));
    }

    public function contact_us()
    {
        return view('frontend/contact-us');
    }

    public function contactsave(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,10',
            'sub' => 'required',
            'msg' => 'required'
        ]);

        // Creating a new contact record
        $contact = new ContactUs();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->sub = $validatedData['sub'];
        $contact->msg = $validatedData['msg'];
        $contact->save();

        
        // Sending an email
        $recipient = "zalapriyanka1997@gmail.com";
        Mail::to($recipient)->send(new ContactMail(
            $validatedData['name'],
            $validatedData['email'],
            $validatedData['phone'],
            $validatedData['sub'],
            $validatedData['msg']
        ));

        $msg = 'Your message has been send successfully';

        return back()->with('success', $msg);


        // if ($result) {
        //     return redirect('frontend/contact-us')->withSuccess('Procedure Fee detail added successfully!');
        // } else {
        //     return redirect('frontend/contact-us')->withError('Procedure Fee detail not added successfully!');
        // }




        return view('frontend/contact-us');
    }


    public function Careers()
    {
        return view('frontend/Careers');
    }
}
