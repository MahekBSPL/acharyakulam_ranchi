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
        //
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
                $image->move(public_path('/admin/upload/council'), $imageName);
                $imageModel = new Winner();
                $imageModel->image = $imageName;
                $imageModel->save();
            }
            return redirect('/admin/council')->with('success', 'Images uploaded successfully!');
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
