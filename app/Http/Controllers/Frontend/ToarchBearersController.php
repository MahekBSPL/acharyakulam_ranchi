<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToarchBearersController extends Controller
{
    //
    public function yogrishi_swami_ramdev_ji()
    {
        return view('frontend.yogrishi-swami-ramdev-ji');
    }

    public function acharya_balkrishna_ji()
    {
        return view('frontend.acharya-balkrishna-ji');
    }
}
