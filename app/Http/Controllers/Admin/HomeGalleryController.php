<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\HomeGallery;

class HomeGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Home Gallery List';
        $data=HomeGallery::all();
        return view('admin.homegallery.index',['data'=>$data,'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add Home Gallery';
       return view('admin.homegallery.create',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'Required', 
            'url' => 'Required',
            'image' => 'Required | image | mimes:jpeg,jpg,png,webp | max:2048'
        ]);

        if(isset($request->image)){
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('/admin/upload/homegallery'), $image);
        }

        $homegallery = new HomeGallery;
        $homegallery->title = $request->title;
        $homegallery->url = $request->url;
        $homegallery->image =  $image;
        $result = $homegallery->save();
        if($result){
                return redirect('/admin/homegallery')->withSuccess('Home Gallery detail added Successfully!!!');
            } else {
                 return redirect('/admin/homegallery')->withError('Unable to add home gallery!');
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
        $title = "Edit Home Gallery";
        $data = HomeGallery::find($id);
        return view('admin/homegallery/edit', ['data' => $data,'title']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->cmdsubmit)) {
            $request->validate([
                'title' => 'Required',
                'url' => 'Required',
                'image' => 'nullable | image | mimes:jpeg,jpg,png,webp | max:2048'
            ]);
            $homegallery = HomeGallery::find($id);
            if (!$homegallery) {
                return redirect('/admin/homegallery')->with('error', 'Home Gallery not found.');
            }
            // Check if any changes are made
            if ($homegallery->title == $request->title && $homegallery->url == $request->url && !$request->hasFile('image')) {
                return redirect('/admin/homegallery')->withSuccess('No changes made.');
            }
            $homegallery->title = $request->title;
            $homegallery->url = $request->url;
            if (isset($request->image)) {
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/admin/upload/homegallery/'), $newImageName);
                $destination = public_path('/admin/upload/homegallery/') . $homegallery->image;
                if (file_exists($destination)) {
                    unlink($destination);
                }
                $homegallery->image = $newImageName;
            }
           $result =  $homegallery->save();
        return redirect('/admin/homegallery')->withSuccess('Homegallery detail updated Successfully!!!'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $homegallery = HomeGallery::find($id);
        if (!$homegallery) {
            return redirect('/admin/homegallery')->withError('Home Gallery not found.');
        }
        $image_path = public_path('/admin/upload/homegallery/') . $homegallery->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        $homegallery->delete();
        }
        return redirect('/admin/homegallery')->withSuccess('Home Gallery detail deleted Successfully!!!');
    }
}
