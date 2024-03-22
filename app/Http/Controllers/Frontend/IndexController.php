<?php

namespace App\Http\Controllers\frontend;

use App\Models\Admin\Menu;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Models\Admin\Notification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        // Fetch menu data with eager loaded subMenu relationship
        $menu = Menu::with('subMenu')->get();

        // Fetch all menu data without eager loading subMenu relationship
        $data = Menu::all();

        // Pass menu data to the view
        return view('frontend.introduction', compact('data', 'menu'));
    }
}
