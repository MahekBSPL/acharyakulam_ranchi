<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
class IndexController extends Controller
{
    //

    public function index()
    {

        $list = Slider::orderBy('id', 'desc')->select('*')->paginate(10);
        $title = "Slider List";
        $data = Slider::all();
        return view('frontend/index', ['sliders' => $data], compact('title'));
    }
}
