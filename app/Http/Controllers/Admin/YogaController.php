<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Yoga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class YogaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Yoga";
        $yoga = Yoga::orderBy('created_at', 'desc')->get();
        return view('admin.yoga.yoga', ['yogas' => $yoga], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Yoga";
        return view('admin.yoga.create', compact('title'));
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
            if (!is_dir('admin/upload/yoga')) {
                mkdir('admin/upload/yoga', 0777, TRUE);
            }

            $yoga = new Yoga;

            //image upload
            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('admin/upload/yoga'), $image);
                $yoga->image =  $image;
            }

            $result = $yoga->save();

            if ($result) {
                return redirect('admin/yoga')->withSuccess('Yoga detail added successfully!');
            } else {
                return redirect('admin/yoga')->withError('Yoga detail not added successfully!');
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
        $title = "Edit Yoga";
        $yoga = Yoga::find($id);
        return view('admin/yoga/edit', ['yogas' => $yoga, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (isset($request->submit)) {
            $Validation = [
                'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            ];

            $validator = Validator::make($request->all(), $Validation);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $yoga = Yoga::find($id);
            if (!$yoga) {
                return redirect('/admin/yoga')->withError('Yoga detail not found.');
            }

            //image upload
            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->extension();
                $request->image->move(public_path('admin/upload/yoga'), $newimage);
                $imagedestination = public_path('admin/upload/yoga/') . $yoga->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $yoga->image =  $newimage;
            }

            $result = $yoga->save();
            if ($result) {
                return redirect('/admin/yoga')->withSuccess('Yoga detail updated successfully!');
            } else {
                return redirect('/admin/yoga')->withError('Yoga detail not updated successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $yoga = Yoga::find($id);

        // dd($notification);
        if (!$yoga) {
            return redirect('/admin/yoga')->withError('Yoga detail not found.');
        }

        $image_path = public_path('admin/upload/yoga/') . $yoga->image;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $result = $yoga->delete();

        if ($result) {
            return redirect('/admin/yoga')->withSuccess('Yoga detail deleted successfully!');
        } else {
            return redirect('/admin/yoga')->withError('Yoga detail not deleted successfully!');
        }
    }
}
