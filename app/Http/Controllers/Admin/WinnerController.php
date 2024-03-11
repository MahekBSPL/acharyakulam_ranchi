<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Winner;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $title='Winner List';
      $data=Winner::orderBy('order', 'asc')->get();
      return view('admin.winner.index',['winneres'=>$data,'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $title='Add Winner';
       return view('admin.winner.create',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required' // Adjust the validation rule as per your requirement
        ]);

        if ($request->images) {
    //             echo "<pre>";
    // print_r($request->images);
    // echo "</pre>";
    // exit;
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/admin/upload/winner'), $imageName);
                $imageModel = new Winner();
                $imageModel->image = $imageName;
                $imageModel->save();
            }
            return redirect('/admin/winner')->with('success', 'Images uploaded successfully!');
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
        $title = "Edit Winner";
        $data = Winner::find($id);
        return view('admin/winner/edit', ['winneres' => $data,'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->cmdsubmit)) {
            $request->validate([
                'image' => 'nullable | image | mimes:jpeg,jpg,png,webp | max:2048'
            ]);
            $winner = winner::find($id);
            //check if slider is available or not
            if (!$winner) {
                return redirect('/admin/winner')->with('error', 'Winner not found.');
            }
            // Check if any changes are made
            if (!$request->hasFile('image')) {
                return redirect('/admin/winner')->withSuccess('No changes made.');
            }
            // Validate and store the new image
            if (isset($request->image)) {
                //$newImageName = null;
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/admin/upload/winner/'), $newImageName);
                $destination = public_path('/admin/upload/winner/') . $winner->image;
                if (file_exists($destination)) {
                    unlink($destination);
                }
                $winner->image = $newImageName;
            }
             $result =  $winner->save();
            return redirect('/admin/winner')->withSuccess('Winner detail updated Successfully!!!');

            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $winner =Winner::find($id);
       if(!$winner){
        return redirect('/admin/winner')->withError('Winner not found.');
       }
        $image_path = public_path('/admin/upload/winner/') . $winner->image;
        if (file_exists($image_path)) {
            unlink($image_path);
            $winner->delete();
        }
        return redirect('/admin/winner')->withSuccess('Winner detail deleted Successfully!!!');
       }
    }

