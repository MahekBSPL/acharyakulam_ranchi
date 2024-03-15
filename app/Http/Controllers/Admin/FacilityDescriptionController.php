<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\FacilityDescription;
use Illuminate\Support\Facades\Validator;

class FacilityDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Facility Description";
        $facility = FacilityDescription::orderBy('created_at', 'desc')->get();
        return view('admin.facilityDescription.facilityDescription', ['facilitys' => $facility], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Facility Description";
        return view('admin.facilityDescription.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (isset($request->submit)) {
            $Validation = [
                'description' => 'required',
            ];

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $facilityDescription = new FacilityDescription();
            $facilityDescription->description = $request->description;

            $result = $facilityDescription->save();

            if ($result) {
                return redirect('admin/facilitydescription')->withSuccess('Facility Description detail added successfully!');
            } else {
                return redirect('admin/facilitydescription')->withError('Facility Description detail not added successfully!');
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
        $title = "Edit Facility Description";
        $facility = FacilityDescription::find($id);
        return view('admin/facilityDescription/edit', ['facilitys' => $facility, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        if (isset($request->submit)) {
            $Validation = [
                'description' => 'required',
            ];

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $facilityDescription = FacilityDescription::find($id);
            if (!$facilityDescription) {
                return redirect('/admin/facilitydescription')->withError('Facility Description detail not found.');
            }

            //update data as per type condition
            $facilityDescription->description = $request->description;

            $result = $facilityDescription->save();
            if ($result) {
                return redirect('/admin/facilitydescription')->withSuccess('Facility Description detail updated successfully!');
            } else {
                return redirect('/admin/facilitydescription')->withError('Facility Description detail not updated successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $facilityDescription = FacilityDescription::find($id);
        
        // dd($notification);
        if (!$facilityDescription) {
            return redirect('/admin/facilitydescription')->withError('Facility Description detail not found.');
        }

        $result = $facilityDescription->delete();

        if ($result) {
            return redirect('/admin/facilitydescription')->withSuccess('Facility Description detail deleted successfully!');
        } else {
            return redirect('/admin/facilitydescription')->withError('Facility Description detail not deleted successfully!');
        }

    }
}
