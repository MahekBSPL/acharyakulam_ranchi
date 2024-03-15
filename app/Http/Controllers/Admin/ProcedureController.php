<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Procedure;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Procedure";
        $procedure = Procedure::orderBy('created_at', 'desc')->get();
        return view('admin.procedure.procedure', ['procedures' => $procedure], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Procedure";
        return view('admin.procedure.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (isset($request->submit)) {
            $Validation = [
                'class' => 'required',
                'title' => 'required',
                'description' => 'required',
            ];

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $procedure = new Procedure();
            $procedure->class = $request->class;
            $procedure->title = $request->title;
            $procedure->description = $request->description;

            $result = $procedure->save();

            if ($result) {
                return redirect('admin/procedure')->withSuccess('Procedure detail added successfully!');
            } else {
                return redirect('admin/procedure')->withError('Procedure detail not added successfully!');
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
        $title = "Edit Procedure";
        $procedure = Procedure::find($id);
        return view('admin/Procedure/edit', ['procedures' => $procedure, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (isset($request->submit)) {
            $Validation = [
                'class' => 'required',
                'title' => 'required',
                'description' => 'required',
            ];

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $procedure = Procedure::find($id);
            if (!$procedure) {
                return redirect('/admin/procedure')->withError('Procedure detail not found.');
            }

            //update data as per type condition
            $procedure->class = $request->class;
            $procedure->title = $request->title;
            $procedure->description = $request->description;

            $result = $procedure->save();
            if ($result) {
                return redirect('/admin/procedure')->withSuccess('Procedure detail updated successfully!');
            } else {
                return redirect('/admin/procedure')->withError('Procedure detail not updated successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $procedure = Procedure::find($id);
        
        // dd($notification);
        if (!$procedure) {
            return redirect('/admin/procedure')->withError('Procedure detail not found.');
        }

        $result = $procedure->delete();

        if ($result) {
            return redirect('/admin/procedure')->withSuccess('Procedure detail deleted successfully!');
        } else {
            return redirect('/admin/procedure')->withError('Procedure detail not deleted successfully!');
        }
    }
}
