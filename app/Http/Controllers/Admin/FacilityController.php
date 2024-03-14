<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        if (isset($request->submit)) {
            $Validation = [
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'type' => 'required',
            ];

            // Add validation based on type conditionally
            if ($request->has('type')) {
                if ($request->type == '1') {
                    $Validation['description'] = 'required';
                } elseif ($request->type == '2') {
                    $Validation['url'] = 'required|url';
                }
            }
            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            //make directory if not present
            if (!is_dir('admin/upload/facility')) {
                mkdir('admin/upload/facility', 0777, TRUE);
            }

            $facility = new Facility;
            $facility->title = $request->title;
            $facility->type = $request->type;
            $facility->description = $request->description;
            $facility->url = $request->url;

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
        $title = "Edit Facility";
        $facility = Facility::find($id);
        return view('admin/facility/edit', ['facilitys' => $facility, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (isset($request->submit)) {
            $Validation = [
                'title' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'type' => 'required',
            ];

            // Add validation based on  type conditionally
            if ($request->has('type')) {
                if ($request->type == '1') {
                    $Validation['description'] = 'required';
                } elseif ($request->type == '2') {
                    $Validation['url'] = 'required|url';
                }
            }

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $facility = Facility::find($id);
            if (!$facility) {
                return redirect('/admin/facility')->withError('Facility detail not found.');
            }


            //update data as per type condition
            $facility->title = $request->title;

            //image upload
            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->extension();
                $request->image->move(public_path('admin/upload/facility'), $newimage);
                $imagedestination = public_path('admin/upload/facility/') . $facility->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $facility->image =  $newimage;
            }

            if ($request->type == $facility->type) {
                $facility->description = $request->description;
                $facility->url = $request->url;
            } else if ($request->type != $facility->type) {
                if ($request->type == '1') {
                    $facility->url = null;
                    $facility->description =  $request->description;
                } else if ($request->type == '2') {
                    $facility->description =  null;
                    $facility->url =  $request->url;
                }
            }
            $facility->type =  $request->type;


            $result = $facility->save();
            if ($result) {
                return redirect('/admin/facility')->withSuccess('Facility detail updated successfully!');
            } else {
                return redirect('/admin/facility')->withError('Facility detail not updated successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $facility = Facility::find($id);

        // dd($notification);
        if (!$facility) {
            return redirect('/admin/facility')->withError('Facility detail not found.');
        }

        $image_path = public_path('admin/upload/facility/') . $facility->image;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $facility->delete();

        return redirect('/admin/facility')->withSuccess('Facility detail deleted Successfully!!!');
    }
}
