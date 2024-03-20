<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Slider List";
        $data = Slider::all();
        // $data = Slider::orderBy('Order')::all();
        return view('admin.slider.slider', ['sliders' => $data, 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Slider";
        return view('admin.slider.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //if (isset($request->cmdsubmit)) {

        $validator = $request->validate([
            'title' => 'required',
            'image' => 'required | image | mimes:jpeg,jpg,png,webp | max:2048'
        ]);

        if (isset($request->image)) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/admin/upload/slider'), $image);
        }

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->image =  $image;
        $result = $slider->save();

        //     return redirect('/admin/slider')->withSuccess('Slider detail added Successfully!!!');
        // } else {
        //     return redirect('/admin/slider')->withError('Slider detail not added Successfully!!!');
        // }

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Slider detail added Successfully!!!"
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => "Slider detail not added Successfully!!!"
            ]);
        }
        // }
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
        $title = "Edit Slider";
        $data = Slider::find($id);
        return view('admin/slider/edit', ['sliders' => $data], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (isset($request->cmdsubmit)) {
            $request->validate([
                'title' => 'required',
                'image' => 'nullable | image | mimes:jpeg,jpg,png,webp | max:2048'
            ]);

            $slider = slider::find($id);

            //check if slider is available or not
            if (!$slider) {
                return redirect('/admin/slider')->with('error', 'Slider not found.');
            }
            // Check if any changes are made
            if ($slider->title == $request->title && $slider->url == $request->url && !$request->hasFile('image')) {
                return redirect('/admin/slider')->withSuccess('No changes made.');
            }

            $slider->title = $request->title;
            $slider->url = $request->url;

            // Validate and store the new image
            if (isset($request->image)) {
                //$newImageName = null;
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/admin/upload/slider/'), $newImageName);

                $destination = public_path('/admin/upload/slider/') . $slider->image;

                if (file_exists($destination)) {
                    unlink($destination);
                }

                $slider->image = $newImageName;
            }


            $result =  $slider->save();

            if ($result) {
                return redirect('/admin/slider')->withSuccess('Slider detail updated Successfully!!!');
            } else {

                return redirect('/admin/slider')->withSuccess('Slider detail updated Successfully!!!');
            }

           $result =  $slider->save();
            return redirect('/admin/slider')->withSuccess('Slider detail updated Successfully!!!');

        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $slider = Slider::find($id);

        if (!$slider) {
            return redirect('/admin/slider')->withError('Slider not found.');
        }

        $image_path = public_path('/admin/upload/slider/') . $slider->image;
        if (file_exists($image_path)) {
            unlink($image_path);

            $slider->delete();
        }
        return redirect('/admin/slider')->withSuccess('Slider detail deleted Successfully!!!');
    }
}
