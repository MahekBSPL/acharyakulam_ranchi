<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Academic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Academic Session";
        $data = Academic::orderBy('created_at', 'desc')->get();
        return view('admin.academic.academic', ['academics' => $data], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Academic Session";
        return view('admin.academic.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);


        //make directory if not present
        if (!is_dir('admin/upload/academic')) {
            mkdir('admin/upload/academic', 0777, TRUE);
        }
        if (!is_dir('admin/upload/academic/pdf')) {
            mkdir('admin/upload/academic/pdf', 0777, TRUE);
        }

        $academic = new Academic;
        $academic->title = $request->title;
        $academic->year = $request->year;

        //image upload
        if (isset($request->image)) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('admin/upload/academic'), $image);
            $academic->image =  $image;
        }

        //pdf upload
        if (isset($request->pdf)) {
            $file = $request->file('pdf');
            $pdf = date('YmdHis') . '.' . $request->pdf->getClientOriginalExtension();
            $file->move(public_path('admin/upload/academic/pdf'), $pdf);
            $academic->pdf =  $pdf;
        }

        $result = $academic->save();

        if ($result) {
            return redirect('admin/academic')->withSuccess('Academic session detail added successfully!');
        } else {
            return redirect('admin/academic')->withError('Academic session detail not added successfully!');
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
        $title = "Edit Academic Session";
        $data = Academic::find($id);
        return view('admin/academic/edit', ['academics' => $data, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        //make directory if not present
        if (!is_dir('admin/upload/academic')) {
            mkdir('admin/upload/academic', 0777, TRUE);
        }
        if (!is_dir('admin/upload/academic/pdf')) {
            mkdir('admin/upload/academic/pdf', 0777, TRUE);
        }

        //find id
        $academic = Academic::find($id);

        //if not than show error msf
        if (!$academic) {
            return redirect('/admin/academic')->withError('academic detail not found.');
        }

        //update data
        $academic->title = $request->title;
        $academic->year = $request->year;

        //update new image and remove old image
        if (isset($request->image)) {
            $newimage = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('admin/upload/academic/'), $newimage);
            $imagedestination = public_path('admin/upload/academic/') . $academic->image;
            if (file_exists($imagedestination) && is_file($imagedestination)) {
                unlink($imagedestination);
            }
            $academic->image =  $newimage;
        }

        //update new pdf and remove old pdf
        if (isset($request->pdf)) {
            $file = $request->file('pdf');
            $newpdf = date('YmdHis') . '.' . $request->pdf->getClientOriginalExtension();
            $file->move(public_path('admin/upload/academic/pdf'), $newpdf);
            $pdfdestination = public_path('admin/upload/academic/pdf/') . $academic->pdf;
            if (file_exists($pdfdestination) && is_file($pdfdestination)) {
                unlink($pdfdestination);
            }
            $academic->pdf =  $newpdf;
        }
  
        $result = $academic->save();

        if ($result) {
            return redirect('admin/academic')->withSuccess('Academic session detail updated successfully!');
        } else {
            return redirect('admin/academic')->withError('Academic session detail not updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $academic = Academic::find($id);

        //if not than show error msf
        if (!$academic) {
            return redirect('/admin/academic')->withError('Academic detail not found.');
        }

        $image_path = public_path('admin/upload/academic/') . $academic->image;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $pdf_path = public_path('admin/upload/academic/pdf/') . $academic->pdf;
        if (file_exists($pdf_path) && is_file($pdf_path)) {
            unlink($pdf_path);
        }

        $result = $academic->delete();
        if ($result) {
            return redirect('admin/academic')->withSuccess('Academic session detail deleted successfully!');
        } else {
            return redirect('admin/academic')->withError('Academic session detail not deleted successfully!');
        }
    }
}
