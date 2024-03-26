<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Prospectu;

class ProspectusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Prospectus List';
        $data=Prospectu::all();
        return view('admin.prospectus.index', ['title' => $title,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Prospectus';
        return view('admin.prospectus.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->cmdsubmit)) {
            $validator = $request->validate([
                'title' => 'Required',
                'image' => 'Required | image | mimes:jpeg,jpg,png,webp | max:2048',
                'pdf' => 'required|file|mimes:pdf' 
            ]);
            if (isset($request->image)) {
                $image = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/admin/upload/prospectus/image'), $image);
            }
            if ($request->hasFile('pdf')) {
                $pdf = time() . '.' . $request->pdf->extension();
                $request->pdf->move(public_path('/admin/upload/prospectus/pdf'), $pdf);
            }
            $prospectus = new Prospectu;
            $prospectus->title = $request->title;
            $prospectus->pdf = $pdf;
            $prospectus->image = $image;
            $result = $prospectus->save();
            if ($result) {
                return redirect('/admin/prospectus')->withSuccess('Prospectus detail added Successfully!!!');
            } else {
                return redirect('/admin/prospectus')->withError('Prospectus detail not added Successfully!!!');
            }
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
         $title = "Edit Prospectus";
         $data = Prospectu::find($id);
         return view('admin/prospectus/edit', ['data' => $data,'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->cmdsubmit)) {
            $validator = $request->validate([
                'title' => 'Required',
             
            ]);
            $prospectus = Prospectu::find($id);
            if (isset($request->image)) {
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/admin/upload/prospectus/image/'), $newImageName);
                $destination = public_path('/admin/upload/prospectus/image/') . $prospectus->image;
                if (file_exists($destination)) {
                    unlink($destination);
                }
                $prospectus->image = $newImageName;
            }
            if (isset($request->pdf)) {
                $pdf = $request->file('pdf');
                $newPdfName = time() . '.' . $pdf->getClientOriginalExtension();
                $pdf->move(public_path('/admin/upload/prospectus/pdf/'), $newPdfName);
                $destination = public_path('/admin/upload/prospectus/pdf/') . $prospectus->pdf;
                if (file_exists($destination)) {
                    unlink($destination);
                }
                $prospectus->pdf = $newPdfName;
            }
            $prospectus->title = $request->title;
            $result = $prospectus->save();
            if ($result) {
                return redirect('/admin/prospectus')->withSuccess('Prospectus detail updated Successfully!!!');
            } else {
                return redirect('/admin/prospectus')->withError('Unable to update prospectus details!!!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prospectus = Prospectu::find($id);
     
        if (!$prospectus) {
            return redirect('/admin/prospectus')->withError('Prospectus not found.');
        }
        $image_path = public_path('/admin/upload/prospectus/image/') . $prospectus->image;
        // print_r( $image_path );exit;
        if (file_exists($image_path)) {
            unlink($image_path);
            $prospectus->delete();
        } 
        $pdf_path = public_path('/admin/upload/prospectus/pdf/') . $prospectus->pdf;
        if (file_exists($pdf_path)) {
            unlink($pdf_path);
            $prospectus->delete();
        }
        $prospectus->delete();
        return redirect('/admin/prospectus')->withSuccess('Prospectus detail deleted Successfully!!!');
    }
}
