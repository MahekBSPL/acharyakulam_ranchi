<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\CompetitiveExam;
use App\Models\Admin\Participation;
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
        $exam = CompetitiveExam::orderBy('created_at', 'desc')->get();
       // $data = Participation::select('year')->pluck('year');
        $data = Participation::all();
        return view('admin.competitive_exam.competitive_exam', ['exams' => $exam, 'data' => $data], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Competitive Exam";
        //$data = Participation::select('*')->pluck('year');
        $data = Participation::all();
        return view('admin.competitive_exam.create', ['data' => $data], compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'selectyear' => 'required',
            'name' => 'required',
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

        $competitiveexam = new CompetitiveExam;
        $competitiveexam->selectyear = $request->selectyear;
        $competitiveexam->name = $request->name;

        //pdf upload
        if (isset($request->pdf)) {
            $file = $request->file('pdf');
            $pdf = date('YmdHis') . '.' . $request->pdf->getClientOriginalExtension();
            $file->move(public_path('admin/upload/competitiveExam'), $pdf);
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
        $exam = CompetitiveExam::find($id);
        $data = Participation::all();
        //$data = Participation::select('year')->pluck('year');
        return view('admin/competitive_exam/edit', ['exams' => $exam, 'data' => $data, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = $request->validate([
            'selectyear' => 'required',
            'name' => 'required',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        //make directory if not present
        if (!is_dir('admin/upload/competitiveExam/')) {
            mkdir('admin/upload/competitiveExam/', 0777, TRUE);
        }

        //find id
        $competitiveexam = CompetitiveExam::find($id);

        //if not than show error msf
        if (!$competitiveexam) {
            return redirect('/admin/competitive_exam')->withError('competitive detail not found.');
        }

        //update data
        $competitiveexam->selectyear = $request->selectyear;
        $competitiveexam->name = $request->name;

        //update new pdf and remove old pdf
        if (isset($request->pdf)) {
            //$file = $request->file('pdf');
            $newpdf = date('YmdHis') . '.' . $request->pdf->getClientOriginalExtension();
            $request->pdf->move(public_path('admin/upload/competitiveExam/'), $newpdf);
            $pdfdestination = public_path('admin/upload/competitiveExam/') . $competitiveexam->pdf;
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

        $pdf_path = public_path('admin/upload/competitiveExam/') . $competitiveexam->pdf;
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
