<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //

    public function gallery()
    {
        return view('frontend/gallery');
    }
}
