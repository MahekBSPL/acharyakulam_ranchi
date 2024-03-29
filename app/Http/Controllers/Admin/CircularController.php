<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Circular;
use Illuminate\Http\Request;

class CircularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Circular";
        $circulars = Circular::orderBy('created_at', 'desc')->get();
        return view('admin.circular.circular', compact('title','circulars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Circular";
        return view('admin.circular.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'name' => 'required',
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        //make directory if not present
        if (!is_dir('admin/upload/circular')) {
            mkdir('admin/upload/circular', 0777, TRUE);
        }

        $circular = new Circular;
        $circular->name = $request->name;

        //pdf upload
        if (isset($request->pdf)) {
            $file = $request->file('pdf');
            $pdf = date('YmdHis') . '.' . $request->pdf->getClientOriginalExtension();
            $file->move(public_path('admin/upload/circular'), $pdf);
            $circular->pdf =  $pdf;
        }

        $result = $circular->save();

        if ($result) {
            return redirect('admin/circular')->withSuccess('circular detail added successfully!');
        } else {
            return redirect('admin/circular')->withError('circular detail not added successfully!');
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
        $title = "Edit Circular";
        $circulars = Circular::find($id);
        return view('admin/circular/edit', compact('circulars','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = $request->validate([
            'name' => 'required',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        //make directory if not present
        if (!is_dir('admin/upload/circular/')) {
            mkdir('admin/upload/circular/', 0777, TRUE);
        }

        //find id
        $circular = Circular::find($id);

        //if not than show error msf
        if (!$circular) {
            return redirect('/admin/circular')->withError('Circular detail not found.');
        }

        //update data
        $circular->name = $request->name;

        //update new pdf and remove old pdf
        if (isset($request->pdf)) {
            //$file = $request->file('pdf');
            $newpdf = date('YmdHis') . '.' . $request->pdf->getClientOriginalExtension();
            $request->pdf->move(public_path('admin/upload/circular/'), $newpdf);
            $pdfdestination = public_path('admin/upload/circular/') . $circular->pdf;
            if (file_exists($pdfdestination) && is_file($pdfdestination)) {
                unlink($pdfdestination);
            }
            $circular->pdf =  $newpdf;
        }
        //dd($competitiveexam);
        $result = $circular->save();

        if ($result) {
            return redirect('admin/circular')->withSuccess('Circular detail updated successfully!');
        } else {
            return redirect('admin/circular')->withError('Circular detail not updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $circular = Circular::find($id);

        //if not than show error msf
        if (!$circular) {
            return redirect('/admin/circular')->withError('circular detail not found.');
        }

        $pdf_path = public_path('admin/upload/circular/') . $circular->pdf;
        if (file_exists($pdf_path) && is_file($pdf_path)) {
            unlink($pdf_path);
        }

        $result = $circular->delete();
        if ($result) {
            return redirect('admin/circular')->withSuccess('Circular detail deleted successfully!');
        } else {
            return redirect('admin/circular')->withError('Circular detail not deleted successfully!');
        }

    }
}
