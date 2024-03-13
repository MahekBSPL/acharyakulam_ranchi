<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\CompetitiveExam;
use Illuminate\Support\Facades\Validator;

class CompetitiveExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Competitive Exam";
        $data = CompetitiveExam::orderBy('created_at', 'desc')->get();
        return view('admin.competitive_exam.competitive_exam', ['exams' => $data], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Competitive Exam";
        return view('admin.competitive_exam.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validator = $request->validate([
                'title' => 'required',
            'name' =>'required',
            'year' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        //second method for validation 

        // $validator = Validator::make($request->all(), [
        //     'title' => 'required',
        //     'name' =>'required',
        //     'year' => 'required',
        //     'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        //     'pdf' => 'required|file|mimes:pdf|max:2048',
        // ]);
        
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }


        //make directory if not present
        if (!is_dir('admin/upload/competitiveExam')) {
            mkdir('admin/upload/competitiveExam', 0777, TRUE);
        }
        if (!is_dir('admin/upload/competitiveExam/pdf')) {
            mkdir('admin/upload/competitiveExam/pdf', 0777, TRUE);
        }

        $competitiveexam = new CompetitiveExam;
        $competitiveexam->title = $request->title;
        $competitiveexam->name = $request->name;
        $competitiveexam->year = $request->year;

        //image upload
        if (isset($request->image)) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('admin/upload/competitiveExam'), $image);
            $competitiveexam->image =  $image;
        }

        //pdf upload
        if (isset($request->pdf)) {
            $file = $request->file('pdf');
            $pdf = date('YmdHis') . '.' . $request->pdf->getClientOriginalExtension();
            $file->move(public_path('admin/upload/competitiveExam/pdf'), $pdf);
            $competitiveexam->pdf =  $pdf;
        }

        $result = $competitiveexam->save();

        if ($result) {
            return redirect('admin/competitive_exam')->withSuccess('Competitive Exam detail added successfully!');
        } else {
            return redirect('admin/competitive_exam')->withError('Competitive Exam detail not added successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = "Edit Competitive Exam";
        $data = CompetitiveExam::find($id);
        return view('admin/competitive_exam/edit', ['exams' => $data, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = $request->validate([
            'title' => 'required',
            'name' =>'required',
            'year' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        //make directory if not present
        if (!is_dir('admin/upload/competitiveExam')) {
            mkdir('admin/upload/competitiveExam', 0777, TRUE);
        }
        if (!is_dir('admin/upload/competitiveExam/pdf')) {
            mkdir('admin/upload/competitiveExam/pdf', 0777, TRUE);
        }

        //find id
        $competitiveexam = CompetitiveExam::find($id);

        //if not than show error msf
        if (!$competitiveexam) {
            return redirect('/admin/competitive_exam')->withError('competitive detail not found.');
        }

        //update data
        $competitiveexam->title = $request->title;
        $competitiveexam->name = $request->name;
        $competitiveexam->year = $request->year;

        //update new image and remove old image
        if (isset($request->image)) {
            $newimage = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('admin/upload/competitiveExam/'), $newimage);
            $imagedestination = public_path('admin/upload/competitiveExam/') . $competitiveexam->image;
            if (file_exists($imagedestination) && is_file($imagedestination)) {
                unlink($imagedestination);
            }
            $competitiveexam->image =  $newimage;
        }

        //update new pdf and remove old pdf
        if (isset($request->pdf)) {
            //$file = $request->file('pdf');
            $newpdf = date('YmdHis') . '.' . $request->pdf->getClientOriginalExtension();
            $request->pdf->move(public_path('admin/upload/competitiveExam/pdf'), $newpdf);
            $pdfdestination = public_path('admin/upload/competitiveExam/pdf/') . $competitiveexam->pdf;
            if (file_exists($pdfdestination) && is_file($pdfdestination)) {
                unlink($pdfdestination);
            }
            $competitiveexam->pdf =  $newpdf;
        }
//dd($competitiveexam);
        $result = $competitiveexam->save();

        if ($result) {
            return redirect('admin/competitive_exam')->withSuccess('Competitive Exam detail updated successfully!');
        } else {
            return redirect('admin/competitive_exam')->withError('Competitive Exam detail not updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $competitiveexam = CompetitiveExam::find($id);

        //if not than show error msf
        if (!$competitiveexam) {
            return redirect('/admin/competitive_exam')->withError('competitive detail not found.');
        }

        $image_path = public_path('admin/upload/competitiveExam/') . $competitiveexam->image;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $pdf_path = public_path('admin/upload/competitiveExam/pdf/') . $competitiveexam->pdf;
        if (file_exists($pdf_path) && is_file($pdf_path)) {
            unlink($pdf_path);
        }

        $result = $competitiveexam->delete();
        if ($result) {
            return redirect('admin/competitive_exam')->withSuccess('Competitive Exam detail deleted successfully!');
        } else {
            return redirect('admin/competitive_exam')->withError('Competitive Exam detail not deleted successfully!');
        }
    }
}
