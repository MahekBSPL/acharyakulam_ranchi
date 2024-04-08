<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Popup;
use Illuminate\Support\Facades\Validator;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Show Popup Data';
        $data=Popup::all();
        return view('admin.popup.index',['title'=>$title,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $title='Edit Popup Data';
        $data=Popup::find($id);
        return view('admin.popup.edit',['data'=>$data,'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->cmdsubmit)) {
          
            $typeValidation = $request->validate([
                'type' => 'Required',
            ]);
            if ($request->type == 'image') {
                $typeValidation = $request->validate([
                    'image' => 'nullable | mimes:pdf,jpeg,jpg,png,webp | max:2048',
                ]);
            }else if ($request->menutype == 'Url') {
                $typeValidation = $request->validate([
                    'text' => 'Required',
                ]);
            }
            $validator = Validator::make($request->all(), $typeValidation);
            $popup_data = Popup::find($id);
            if (!$popup_data) {
                return redirect('/admin/popup')->withError('Popup detail not found.');
            }
            //if ($request->type == $popup_data->type) {
            if ($request->type == 'image') {
                //image upload
                if (isset($request->image)) {
                    $newimage = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('admin/upload/popup'), $newimage);
                    $imagedestination = public_path('admin/upload/popup/') . $popup_data->image;
                    if (file_exists($imagedestination) && is_file($imagedestination)) {
                        unlink($imagedestination);
                    }
                    $popup_data->image =  $newimage;
                }
                $popup_data->description =  null;
            }
           else if($request->type =='text'){
                $popup_data->description =  $request->description;
                $filedestinatinon = public_path('admin/upload/popup/') . $popup_data->image;
                if (file_exists($filedestinatinon) && is_file($filedestinatinon)) {
                    unlink($filedestinatinon);
                }
                $popup_data->image =  null;
            }
       // }
       $popup_data->type = $request->type;
        $result = $popup_data->save();
        if ($result) {
            return redirect('/admin/popup')->withSuccess('Popup detail updated successfully!');
        }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
