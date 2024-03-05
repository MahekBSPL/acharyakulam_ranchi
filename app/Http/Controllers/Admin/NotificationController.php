<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\SelectType;
use App\Models\Admin\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Notification";
        //return view('admin.notification.notification');
        //$data = Notification::all();
        $data = Notification::orderBy('created_at', 'desc')->get();
        return view('admin.notification.notification', ['notifications' => $data], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Notification";
        $SelectType = SelectType::select('value')->pluck('value');
        return view('admin.notification.create', ['SelectType' => $SelectType], compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        // exit;
        if (isset($request->submit)) {
            $menutypeValidation = $request->validate([
                'language' => 'Required',
                'title' => 'Required',
                'notificationtype' => 'Required',
                'menutype' => 'Required',
            ]);

            if (isset($request->menutype)) {
                if ($request->menutype == 'Content') {
                    $menutypeValidation = $request->validate([
                        'keyword' => 'Required',
                        'description' => 'Required',
                        'image' => 'Required | mimes:pdf,jpeg,jpg,png,webp | max:2048',
                    ]);
                } else if ($request->menutype == 'File upload') {
                    $menutypeValidation = $request->validate([
                        'fileupload' => 'Required | mimes:pdf,jpeg,jpg,png,webp | max:2048',
                    ]);
                } else if ($request->menutype == 'Url') {
                    $menutypeValidation = $request->validate([
                        'url' => 'Required|url',
                    ]);
                }
            }
        }

        $validator = Validator::make($request->all(), $menutypeValidation);

        $notification = new Notification;
        $notification->language = $request->language;
        $notification->title = $request->title;
        $notification->notificationtype = $request->notificationtype;
        $notification->menutype =  $request->menutype;
        $notification->keyword =  $request->keyword;
        $notification->description =  $request->description;
        $notification->url =  $request->url;
        $notification->startdate =  $request->startdate;
        $notification->enddate =  $request->enddate;

        //image upload
        if (isset($request->image)) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/admin/upload/notification'), $image);
            $notification->image =  $image;
        }

        //file upload 
        if (isset($request->fileupload)) {
            $fileupload = time() . '.' . $request->fileupload->getClientOriginalExtension();
            $request->fileupload->move(public_path('admin/upload/notification'), $fileupload);
            //dd($x);
            $notification->fileupload =  $fileupload;
        }

        // print("hi");
        //dd( $notification->fileupload);
        $result = $notification->save();
        //dd($result);
        // print("hi");

        // Check if the save operation was successful
        if ($result) {
            return redirect('/admin/notification')->withSuccess('Notification detail added successfully!');
        } else {
            return redirect('/admin/notification')->withError('Notification detail not added successfully!');
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
        $title = "Edit Notification";
        $data = Notification::find($id);
        $SelectType = SelectType::select('value')->pluck('value');
        return view('admin/notification/edit', ['notifications' => $data, 'SelectType' => $SelectType, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());

        if (isset($request->submit)) {
            $menutypeValidation = $request->validate([
                'language' => 'Required',
                'title' => 'Required',
                'notificationtype' => 'Required',

            ]);

            if (isset($request->menutype)) {
                if ($request->menutype == 'Content') {
                    $menutypeValidation = $request->validate([
                        'keyword' => 'Required',
                        'description' => 'Required',
                        'image' => 'nullable | mimes:pdf,jpeg,jpg,png,webp | max:2048',
                    ]);
                } else if ($request->menutype == 'File upload') {
                    $menutypeValidation = $request->validate([
                        'fileupload' => 'nullable | mimes:pdf,jpeg,jpg,png,webp | max:2048',
                    ]);
                } else if ($request->menutype == 'Url') {
                    $menutypeValidation = $request->validate([
                        'url' => 'Required|url',
                    ]);
                }
            }

            $validator = Validator::make($request->all(), $menutypeValidation);

            $notification = Notification::find($id);
            if (!$notification) {
                return redirect('/admin/notification')->withError('Notification detail not found.');
            }
            //dd($notification);
            // print_r("hi");

            //check if menutype is changed
            if ($request->menutype != $notification->menutype) {
                if ($request->menutype == 'Content') {
                   // $notification->fileupload = null;
                    $notification->url = null;
                    $filedestinatinon = (public_path('admin/upload/notification/') . $notification->fileupload);
                    if (file_exists($filedestinatinon)) {
                        unlink($filedestinatinon);
                    }
                }

                if ($request->menutype == 'File upload') {
                    $notification->keyword = null;
                    $notification->description = null;
                    $notification->url = null;

                    $imagedestination = public_path('/admin/upload/notification/') . $notification->image;
                    if (file_exists($imagedestination)) {
                        unlink($imagedestination);
                    }
                }

                if ($request->menutype == 'Url') {
                    $notification->keyword = null;
                    $notification->description = null;

                    $imagedestination = public_path('admin/upload/notification/') . $notification->image;
                    if (file_exists($imagedestination)) {
                        unlink($imagedestination);
                    }

                    $filedestinatinon = (public_path('admin/upload/notification/') . $notification->fileupload);
                    if (file_exists($filedestinatinon)) {
                        unlink($filedestinatinon);
                    }
                }
            
            }

            $notification->language = $request->language;
            $notification->title = $request->title;
            $notification->notificationtype = $request->notificationtype;
            $notification->menutype =  $request->menutype;
            $notification->keyword =  $request->keyword;
            $notification->description =  $request->description;
            $notification->url =  $request->url;
            $notification->startdate =  $request->startdate;
            $notification->enddate =  $request->enddate;

            //image upload
            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/admin/upload/notification'), $newimage);
                $imagedestination = public_path('/admin/upload/notification/') . $notification->image;

                if (file_exists($imagedestination)) {
                    unlink($imagedestination);
                }

                $notification->image =  $newimage;
            }

            //file upload 
            if (isset($request->fileupload)) {
                $newfileupload = time() . '.' . $request->fileupload->extension();
                $request->fileupload->move(public_path('/admin/upload/notification'), $newfileupload);

                $filedestinatinon = (public_path('admin/upload/notification/') . $notification->fileupload);
                //dd($newfileupload);
                //dd($filedestinatinon);

                // dd($request->all());
                if (file_exists($filedestinatinon)) {
                    unlink($filedestinatinon);
                }

                $notification->fileupload =  $newfileupload;
            }

            // print("hi");
            $result = $notification->save();
            // dd($result);
            // print("hi");

            // Check if the save operation was successful
            if ($result) {
                return redirect('/admin/notification')->withSuccess('Notification detail updated successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
