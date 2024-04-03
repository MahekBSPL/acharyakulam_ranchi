<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\HouseActivity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HouseActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "House Activity";
        $activity = HouseActivity::orderBy('created_at', 'desc')->get();
        return view('admin.house_activity.house_activity', ['activitys' => $activity], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add House Activity";
        return view('admin.house_activity.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (isset($request->submit)) {
            $Validation = [
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'description' => 'required',
            ];

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            //make directory if not present
            if (!is_dir('admin/upload/houseactivity')) {
                mkdir('admin/upload/houseactivity', 0777, TRUE);
            }

            $activity = new HouseActivity();
            $activity->name = $request->name;
            $activity->description = $request->description;

            //image upload
            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('admin/upload/houseactivity'), $image);
                $activity->image =  $image;
            }

            $result = $activity->save();

            if ($result) {
                return redirect('admin/house_activity')->withSuccess('House activity detail added successfully!');
            } else {
                return redirect('admin/house_activity')->withError('House activity detail not added successfully!');
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
        $title = "Edit House Activity";
        $activity = HouseActivity::find($id);
        return view('admin/house_activity/edit', ['activitys' => $activity, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (isset($request->submit)) {
            $Validation = [
                'name' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'description' => 'required',
            ];

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $activity = HouseActivity::find($id);
            if (!$activity) {
                return redirect('/admin/house_activity')->withError('House activity detail not found.');
            }


            //update data as per type condition
            $activity->name = $request->name;
            $activity->description = $request->description;

            //image upload
            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->extension();
                $request->image->move(public_path('admin/upload/houseactivity'), $newimage);
                $imagedestination = public_path('admin/upload/houseactivity/') . $activity->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $activity->image =  $newimage;
            }

            $result = $activity->save();
            if ($result) {
                return redirect('/admin/house_activity')->withSuccess('House activity detail updated successfully!');
            } else {
                return redirect('/admin/house_activity')->withError('House activity detail not updated successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $activity = HouseActivity::find($id);

        // dd($notification);
        if (!$activity) {
            return redirect('/admin/house_activity')->withError('House activity detail not found.');
        }

        $image_path = public_path('admin/upload/houseactivity/') . $activity->image;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $result = $activity->delete();

        if ($result) {
            return redirect('/admin/house_activity')->withSuccess('House activity detail deleted successfully!');
        } else {
            return redirect('/admin/house_activity')->withError('House activity detail not deleted successfully!');
        }

    }
}
