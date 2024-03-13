<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Facility";
        $data = Facility::orderBy('created_at', 'desc')->get();
        return view('admin.facility.facility', ['facilitys' => $data], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Facility";
        return view('admin.facility.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'description' => 'required',
        ]);

        //make directory if not present
        if (!is_dir('admin/upload/facility')) {
            mkdir('admin/upload/facility', 0777, TRUE);
        }

        $facility = new Facility;
        $facility->title = $request->title;
        $facility->description = $request->description;

        //image upload
        if (isset($request->image)) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('admin/upload/facility'), $image);
            $facility->image =  $image;
        }

        $result = $facility->save();

        if ($result) {
            return redirect('admin/facility')->withSuccess('Facility detail added successfully!');
        } else {
            return redirect('admin/facility')->withError('Facility detail not added successfully!');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
