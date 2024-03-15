<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\ProcedureDescription;

class ProcedureDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Procedure Description";
        $proceduredescription = ProcedureDescription::orderBy('created_at', 'desc')->get();
        return view('admin.procedureDescription.procedureDescription', ['proceduredescriptions' => $proceduredescription], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Procedure Description";
        return view('admin.procedureDescription.create', compact('title'));
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

            $proceduredescription = new ProcedureDescription();
            $proceduredescription->description = $request->description;

            $result = $proceduredescription->save();

            if ($result) {
                return redirect('admin/proceduredescription')->withSuccess('Procedure Description detail added successfully!');
            } else {
                return redirect('admin/proceduredescription')->withError('Procedure Description detail not added successfully!');
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
        $title = "Edit Procedure Description";
        $proceduredescription = ProcedureDescription::find($id);
        return view('admin/ProcedureDescription/edit', ['proceduredescriptions' => $proceduredescription, 'title' => $title]);
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

            $proceduredescription = ProcedureDescription::find($id);
            if (!$proceduredescription) {
                return redirect('/admin/proceduredescription')->withError('Procedure Description detail not found.');
            }

            //update data as per type condition
            $proceduredescription->description = $request->description;

            $result = $proceduredescription->save();

            if ($result) {
                return redirect('/admin/proceduredescription')->withSuccess('Procedure Description detail updated successfully!');
            } else {
                return redirect('/admin/proceduredescription')->withError('Procedure Description detail not updated successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $proceduredescription = ProcedureDescription::find($id);
        
        // dd($notification);
        if (!$proceduredescription) {
            return redirect('/admin/proceduredescription')->withError('Procedure description detail not found.');
        }

        $result = $proceduredescription->delete();

        if ($result) {
            return redirect('/admin/proceduredescription')->withSuccess('Procedure Description detail deleted successfully!');
        } else {
            return redirect('/admin/proceduredescription')->withError('Procedure Description detail not deleted successfully!');
        }
    }
}
