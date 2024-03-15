<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\ProcedureFee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProcedureFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Procedure Fee";
        $procedurefee = ProcedureFee::orderBy('created_at', 'desc')->get();
        return view('admin.procedureFee.procedureFee', ['procedurefees' => $procedurefee], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Procedure Fee";
        return view('admin.procedureFee.create', compact('title'));
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

            $procedurefee = new ProcedureFee();
            $procedurefee->description = $request->description;

            $result = $procedurefee->save();

            if ($result) {
                return redirect('admin/procedurefee')->withSuccess('Procedure Fee detail added successfully!');
            } else {
                return redirect('admin/procedurefee')->withError('Procedure Fee detail not added successfully!');
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
        $title = "Edit Procedure Fee";
        $procedurefee = ProcedureFee::find($id);
        return view('admin/ProcedureFee/edit', ['procedurefees' => $procedurefee, 'title' => $title]);
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

            $procedurefee = ProcedureFee::find($id);
            if (!$procedurefee) {
                return redirect('/admin/procedurefee')->withError('Procedure fee detail not found.');
            }

            //update data as per type condition
            $procedurefee->description = $request->description;

            $result = $procedurefee->save();

            if ($result) {
                return redirect('/admin/procedurefee')->withSuccess('Procedure Fee detail updated successfully!');
            } else {
                return redirect('/admin/procedurefee')->withError('Procedure Fee detail not updated successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $procedurefee = ProcedureFee::find($id);
        
        // dd($notification);
        if (!$procedurefee) {
            return redirect('/admin/procedurefee')->withError('Procedure fee detail not found.');
        }

        $result = $procedurefee->delete();

        if ($result) {
            return redirect('/admin/procedurefee')->withSuccess('Procedure fee detail deleted successfully!');
        } else {
            return redirect('/admin/procedurefee')->withError('Procedure fee detail not deleted successfully!');
        }
    }
}
