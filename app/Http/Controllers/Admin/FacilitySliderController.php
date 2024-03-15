<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\FacilitySlider;
use Illuminate\Support\Facades\Validator;

class FacilitySliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Facility Slider";
        $facility = FacilitySlider::orderBy('created_at', 'desc')->get();
        return view('admin.facilityslider.facilitySlider', ['facilitys' => $facility], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Facility Slider";
        return view('admin.facilitySlider.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (isset($request->submit)) {
            $Validation = [
                'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            ];

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            //make directory if not present
            if (!is_dir('admin/upload/facilitySlider')) {
                mkdir('admin/upload/facilitySlider', 0777, TRUE);
            }

            $facilitySlider = new FacilitySlider();

            //image upload
            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('admin/upload/facilitySlider'), $image);
                $facilitySlider->image =  $image;
            }


            $result = $facilitySlider->save();

            if ($result) {
                return redirect('admin/facilityslider')->withSuccess('Facility Slider detail added successfully!');
            } else {
                return redirect('admin/facilityslider')->withError('Facility Slider detail not added successfully!');
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
        //
        $title = "Edit Facility Slider";
        $facility = FacilitySlider::find($id);
        return view('admin/facilitySlider/edit', ['facilitys' => $facility, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (isset($request->submit)) {
            $Validation = [
                'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            ];

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $facilitySlider = FacilitySlider::find($id);

            if (!$facilitySlider) {
                return redirect('/admin/facilityslider')->withError('Facility Slider detail not found.');
            }

            //update new image and remove old image
            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('admin/upload/facilitySlider/'), $newimage);
                $imagedestination = public_path('admin/upload/facilitySlider/') . $facilitySlider->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $facilitySlider->image =  $newimage;
            }

            $result = $facilitySlider->save();
            if ($result) {
                return redirect('/admin/facilityslider')->withSuccess('Facility Slider detail updated successfully!');
            } else {
                return redirect('/admin/facilityslider')->withError('Facility Slider detail not updated successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $facilitySlider = FacilitySlider::find($id);

        //if not than show error msf
        if (!$facilitySlider) {
            return redirect('/admin/facilityslider')->withError('Facility Slider detail not found.');
        }

        $image_path = public_path('admin/upload/facilitySlider/') . $facilitySlider->image;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $result = $facilitySlider->delete();
        if ($result) {
            return redirect('admin/facilityslider')->withSuccess('Facility slider detail deleted successfully!');
        } else {
            return redirect('admin/Facilityslider')->withError('Facility slider detail not deleted successfully!');
        }
    }
}
