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
        //$SelectType = SelectType::select('value')->pluck('value');
        $SelectType = SelectType::all();
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
            $Validation = [
                'language' => 'Required',
                'title' => 'Required',
                'notificationtype' => 'Required',
                'menutype' => 'Required',
                'startdate' => 'Required',
                'enddate' => 'Required|after_or_equal:startdate',
                'status' => 'Required',
            ];
            $customMessages = [
                'enddate.after_or_equal' => 'The end date must be greater than or equal to the start date.',
            ];

            // Add validation based on menu type conditionally
            if ($request->has('menutype')) {
                if ($request->menutype == 'Content') {
                    $Validation['keyword'] = 'required';
                    $Validation['description'] = 'required';
                    $Validation['image'] = 'required|mimes:pdf,jpeg,jpg,png,webp|max:2048';
                } elseif ($request->menutype == 'File upload') {
                    $Validation['fileupload'] = 'required|mimes:pdf,jpeg,jpg,png,webp|max:2048';
                } elseif ($request->menutype == 'Url') {
                    $Validation['url'] = 'required|url';
                }
            }

            $validator = Validator::make($request->all(), $Validation, $customMessages);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }


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
            $notification->status =  $request->status;

            //image upload
            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('admin/upload/notification'), $image);
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
            //print_r($request->menutype);exit;
            $Validation = [
                'language' => 'Required',
                'title' => 'Required',
                'notificationtype' => 'Required',
                'menutype' => 'Required',
                'startdate' => 'Required',
                'enddate' => 'Required|after_or_equal:startdate',
                'status' => 'Required',
            ];
            $customMessages = [
                'enddate.after_or_equal' => 'The end date must be greater than or equal to the start date.',
            ];

            // Add validation based on menu type conditionally
            if ($request->has('menutype')) {
                if ($request->menutype == 'Content') {
                    $Validation['keyword'] = 'required';
                    $Validation['description'] = 'required';
                    $Validation['image'] = 'nullable|mimes:pdf,jpeg,jpg,png,webp|max:2048';
                } elseif ($request->menutype == 'File upload') {
                    $Validation['fileupload'] = 'nullable|mimes:pdf,jpeg,jpg,png,webp|max:2048';
                } elseif ($request->menutype == 'Url') {
                    $Validation['url'] = 'required|url';
                }
            }

            $validator = Validator::make($request->all(), $Validation, $customMessages);

            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $notification = Notification::find($id);
            if (!$notification) {
                return redirect('/admin/notification')->withError('Notification detail not found.');
            }
            //dd($notification);
            // print_r("hi");

            $notification->language = $request->language;
            $notification->title = $request->title;
            $notification->notificationtype = $request->notificationtype;
            $notification->startdate =  $request->startdate;
            $notification->enddate =  $request->enddate;
            $notification->status =  $request->status;

            if ($request->menutype == $notification->menutype) {
                $notification->menutype =  $request->menutype;
                $notification->keyword =  $request->keyword;
                $notification->description =  $request->description;
                $notification->url =  $request->url;
                //image upload
                if (isset($request->image)) {
                    $newimage = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('admin/upload/notification'), $newimage);
                    $imagedestination = public_path('admin/upload/notification/') . $notification->image;
                    if (file_exists($imagedestination) && is_file($imagedestination)) {
                        unlink($imagedestination);
                    }
                    $notification->image =  $newimage;
                    //dd($notification->image);
                }

                //file upload 
                if (isset($request->fileupload)) {
                    $newfileupload = time() . '.' . $request->fileupload->extension();
                    $request->fileupload->move(public_path('/admin/upload/notification'), $newfileupload);
                    $filedestinatinon = (public_path('admin/upload/notification/') . $notification->fileupload);
                    //dd($newfileupload);
                    //dd($filedestinatinon);

                    // dd($request->all());
                    if (file_exists($filedestinatinon) && is_file($filedestinatinon)) {
                        unlink($filedestinatinon);
                    }

                    $notification->fileupload =  $newfileupload;
                }
            } else if ($request->menutype != $notification->menutype) {
                if ($request->menutype == 'Content') {

                    $filedestinatinon = public_path('admin/upload/notification/') . $notification->fileupload;
                    if (file_exists($filedestinatinon) && is_file($filedestinatinon)) {
                        unlink($filedestinatinon);
                    }
                    $notification->fileupload = null;
                    $notification->url = null;
                    $notification->keyword =  $request->keyword;
                    $notification->description =  $request->description;

                    //image upload
                    if (isset($request->image)) {
                        $newimage = time() . '.' . $request->image->extension();
                        $request->image->move(public_path('admin/upload/notification'), $newimage);
                        $imagedestination = public_path('admin/upload/notification/') . $notification->image;
                        if (file_exists($imagedestination) && is_file($imagedestination)) {
                            unlink($imagedestination);
                        }
                        $notification->image =  $newimage;
                        //dd($notification->image);
                    }
                } else if ($request->menutype == 'Url') {
                    $filedestinatinon = (public_path('admin/upload/notification/') . $notification->fileupload);
                    if (file_exists($filedestinatinon) && is_file($filedestinatinon)) {
                        unlink($filedestinatinon);
                    }

                    $imagedestination = public_path('/admin/upload/notification/') . $notification->image;
                    if (file_exists($imagedestination) && is_file($imagedestination)) {
                        unlink($imagedestination);
                    }

                    $notification->url =  $request->url;
                    $notification->keyword =  null;
                    $notification->description =  null;
                    $notification->image =  null;
                    $notification->fileupload =  null;
                    $notification->menutype =  $request->menutype;
                } else if ($request->menutype == 'File upload') {
                    $imagedestination = public_path('admin/upload/notification/') . $notification->image;
                    if (file_exists($imagedestination) && is_file($imagedestination)) {
                        unlink($imagedestination);
                    }
                    //$notification->menutype = $request->menutype;
                    $notification->url = null;
                    $notification->keyword =  null;
                    $notification->description =  null;
                    $notification->image =  null;
                    $notification->menutype = $request->menutype;
                    if (isset($request->fileupload)) {
                        $newfileupload = time() . '.' . $request->fileupload->extension();
                        $request->fileupload->move(public_path('/admin/upload/notification'), $newfileupload);
                        $filedestinatinon = (public_path('admin/upload/notification/') . $notification->fileupload);
                        //dd($newfileupload);
                        //dd($filedestinatinon);

                        // dd($request->all());
                        if (file_exists($filedestinatinon) && is_file($filedestinatinon)) {
                            unlink($filedestinatinon);
                        }

                        $notification->fileupload =  $newfileupload;
                        //  dd($notification);
                    }
                }
                //dd($notification);
                $notification->menutype =  $request->menutype;
                // dd($notification);
            }



            // print("hi");
            //dd($notification);

            $result = $notification->save();
            // dd($result);
            // print("hi");

            // Check if the save operation was successful
            if ($result) {
                return redirect('/admin/notification')->withSuccess('Notification detail updated successfully!');
            } else {
                return redirect('/admin/notification')->withError('Notification detail not updated successfully!');
            }
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $notification = Notification::find($id);

        // dd($notification);
        if (!$notification) {
            return redirect('/admin/notification')->withError('Notification detail not found.');
        }

        $image_path = public_path('admin/upload/notification/') . $notification->image;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $fileupload_path = public_path('admin/upload/notification/') . $notification->fileupload;
        if (file_exists($fileupload_path) && is_file($fileupload_path)) {
            unlink($fileupload_path);
        }

        $notification->delete();

        return redirect('/admin/notification')->withSuccess('Notification detail deleted Successfully!!!');
    }
}
