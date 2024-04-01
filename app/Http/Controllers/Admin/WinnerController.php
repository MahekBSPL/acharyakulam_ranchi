<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Winner;
use Illuminate\Support\Facades\Validator;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Winner";
        $Winner = Winner::orderBy('order', 'asc')->get();
        return view('admin.winner.index', ['winners' => $Winner], compact('title'));
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
        if (isset($request->submit)) {
            
            if (!is_dir('admin/upload/winner')) {
                mkdir('admin/upload/winner', 0777, TRUE);
            }
            $Winner = new Winner;
            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('admin/upload/winner'), $image);
                $Winner->image =  $image;
            }

            $result = $Winner->save();

            if ($result) {
                return redirect('admin/winner')->withSuccess('Winner added successfully!');
            } else {
                return redirect('admin/winner')->withError('Unable to add Winner!');
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
        $title = "Edit Winner";
        $winner = Winner::find($id);
        return view('admin/winner/edit', ['winner' => $winner, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->submit)) {
           
            $winner = Winner::find($id);
            if (!$winner) {
                return redirect('/admin/winner')->withError('Yoga detail not found.');
            }

            //image upload
            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->extension();
                $request->image->move(public_path('admin/upload/winner'), $newimage);
                $imagedestination = public_path('admin/upload/winner/') . $winner->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $winner->image =  $newimage;
            }

            $result = $winner->save();
            if ($result) {
                return redirect('/admin/winner')->withSuccess('Winner updated successfully!');
            } else {
                return redirect('/admin/winner')->withError('Unable to update winner!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $winner = Winner::find($id);
        if (!$winner) {
            return redirect('/admin/winner')->withError('Winner detail not found.');
        }
        $image_path = public_path('admin/upload/winner/') . $winner->image;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }
        $result = $winner->delete();
        if ($result) {
            return redirect('/admin/winner')->withSuccess('Winner deleted successfully!');
        } else {
            return redirect('/admin/winner')->withError('Unable to delete winner');
        }
    }
}
