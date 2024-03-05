<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    public function index()
    {
        return view('frontend.index');
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
} 
