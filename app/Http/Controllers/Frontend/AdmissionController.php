<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    //
    public function procedure()
    {
        return view('frontend.procedure');
    }

    public function rules()
    {
        return view('frontend.rules');
    }

    public function prospectus()
    {
        return view('frontend.prospectus');
    }
}
