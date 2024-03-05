<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    //
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
        return view('frontend/competitive-exam');
    }

    public function competitive_exam_2022_2023()
    {
        return view('frontend/competitive-exam-2022-2023');
    }

    public function competitive_exam_2023_2024()
    {
        return view('frontend/competitive-exam-2023-2024');
    }

    public function yoga()
    {
        return view('frontend/yoga');
    }
    
}
