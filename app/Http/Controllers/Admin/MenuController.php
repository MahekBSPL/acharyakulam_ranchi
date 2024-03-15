<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use App\Models\Admin\SelectType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Menu";
        //return view('admin.notification.notification');
        //$data = Notification::all();
        $data = Menu::orderBy('created_at', 'desc')->get();
        $SelectType = SelectType::all();
        return view('admin.menu.menu', ['menus' => $data, 'SelectType' => $SelectType ], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Menu";
        $data = DB::table('menus')->select('*')->get();
        //dd($data);
        //$SelectType = SelectType::select('value')->pluck('value');
        $SelectType = SelectType::all();
        return view('admin.menu.create', ['SelectType' => $SelectType, 'data' => $data], compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //     //
        if (isset($request->submit)) {
            $Validation = [
                'menu_category' => 'required',
                'title' => 'required',
                'menu_position' => 'required',
                'banner_image' => 'required|mimes:jpeg,jpg,png,webp|max:2048',
                'status' => 'required',
                'menutype' => 'required'
            ];
        
            // Add validation based on menu type conditionally
            if ($request->has('menutype')) {
                if ($request->menutype == '1') {
                    $Validation['keyword'] = 'required';
                    $Validation['description'] = 'required';
                    $Validation['image'] = 'required|mimes:pdf,jpeg,jpg,png,webp|max:2048';
                } elseif ($request->menutype == '2') {
                    $Validation['fileupload'] = 'required|mimes:pdf,jpeg,jpg,png,webp|max:2048';
                } elseif ($request->menutype == '3') {
                    $Validation['url'] = 'required|url';
                }
            }

            if($request->menu_category == '2'){
                $Validation['parent_menu'] = 'required';
            }
        
            $validator = Validator::make($request->all(), $Validation);
        
            if ($validator->fails()) {
                // Handle validation failure manually, e.g., return back with errors
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            $menu = new Menu;
            $menu->menu_category = $request->menu_category;
            $menu->parent_menu = $request->parent_menu;
            $menu->title = $request->title;
            $menu->menutype =  $request->menutype;
            $menu->keyword =  $request->keyword;
            $menu->description =  $request->description;
            $menu->url =  $request->url;
            $menu->menu_position =  $request->menu_position;
            $menu->admin_id =  Auth()->user()->id;
            $menu->status =  $request->status;

            if (!is_dir('admin/upload/menu')) {
                mkdir('admin/upload/menu', 0777, TRUE);
            }

            if (!is_dir('admin/upload/menu/banner')) {
                mkdir('admin/upload/menu/banner', 0777, TRUE);
            }



            //image upload
            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('admin/upload/menu'), $image);
                $menu->image =  $image;
            }

            //file upload 
            if (isset($request->fileupload)) {
                $fileupload = time() . '.' . $request->fileupload->getClientOriginalExtension();
                $request->fileupload->move(public_path('admin/upload/menu'), $fileupload);
                //dd($x);
                $menu->fileupload =  $fileupload;
            }

            //banner image
            if (isset($request->banner_image)) {
                $file = $request->file('banner_image');
                $banner_image = date('YmdHis') . '.' . $request->banner_image->getClientOriginalExtension();
                //dd($banner_image);
                $x = $file->move(public_path('admin/upload/menu/banner'), $banner_image);
                // dd($x);
                $menu->banner_image =  $banner_image;
            }

            // dd($menu);

            $result = $menu->save();
            //dd($result);
            // print("hi");

            // Check if the save operation was successful
            if ($result) {
                return redirect('/admin/menu')->withSuccess('Menu detail added successfully!');
            } else {
                return redirect('/admin/menu')->withError('Menu detail not added successfully!');
            }

            //     echo "<pre>";
            //     print_r($request->image);
            // print_r($request->file_upload);
            // print_r($request->banner_image);
            // echo "</pre>";
            // exit;
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
        $title = "Edit Menu";
        $data = Menu::find($id);
       // $SelectType = SelectType::select('value')->pluck('value');
        $SelectType = SelectType::all();
        $submenu = DB::table('menus')->select('*')->get();
        return view('admin/menu/edit', ['menus' => $data, 'SelectType' => $SelectType, 'submenu'=> $submenu, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $Validation = [
            'menu_category' => 'required',
            'title' => 'required',
            'menu_position' => 'required',
            'banner_image' => 'nullable|mimes:jpeg,jpg,png,webp|max:2048',
            'status' => 'required',
            'menutype' => 'required'
        ];
    
        // Add validation based on menu type conditionally
        if ($request->has('menutype')) {
            if ($request->menutype == '1') {
                $Validation['keyword'] = 'required';
                $Validation['description'] = 'required';
                $Validation['image'] = 'nullable|mimes:pdf,jpeg,jpg,png,webp|max:2048';
            } elseif ($request->menutype == '2') {
                $Validation['fileupload'] = 'nullable|mimes:pdf,jpeg,jpg,png,webp|max:2048';
            } elseif ($request->menutype == '3') {
                $Validation['url'] = 'required|url';
            }
        }

      //dd($request->all());
        if($request->menu_category == '2'){
            $Validation['parent_menu'] = 'required';
        }
    
        $validator = Validator::make($request->all(), $Validation);

        //dd($validator);
        if ($validator->fails()) {
            // Handle validation failure manually, e.g., return back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }
 //dd($validator);
        $menu = menu::find($id);
        if (!$menu) {
            return redirect('/admin/menu')->withError('Menu detail not found.');
        }
   
        // print_r("hi");

        $menu->menu_category = $request->menu_category;
        $menu->parent_menu = $request->parent_menu;
        $menu->title = $request->title;
        //$menu->menutype =  $request->menutype;
        $menu->keyword =  $request->keyword;
        $menu->description =  $request->description;
        $menu->url =  $request->url;
        $menu->menu_position =  $request->menu_position;
        $menu->admin_id =  Auth()->user()->id;
        $menu->status =  $request->status;

        if ($request->menutype == $menu->menutype) {
            $menu->menutype =  $request->menutype;
            $menu->keyword =  $request->keyword;
            $menu->description =  $request->description;
            $menu->url =  $request->url;
            //image upload
            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->extension();
                $request->image->move(public_path('admin/upload/menu'), $newimage);
                $imagedestination = public_path('admin/upload/menu/') . $menu->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $menu->image =  $newimage;
                //dd($notification->image);
            }

            //file upload 
            if (isset($request->fileupload)) {
                $newfileupload = time() . '.' . $request->fileupload->extension();
                $request->fileupload->move(public_path('/admin/upload/menu'), $newfileupload);
                $filedestinatinon = (public_path('admin/upload/menu/') . $menu->fileupload);
                //dd($newfileupload);
                //dd($filedestinatinon);

                // dd($request->all());
                if (file_exists($filedestinatinon) && is_file($filedestinatinon)) {
                    unlink($filedestinatinon);
                }

                $menu->fileupload =  $newfileupload;
            }
        } else if ($request->menutype != $menu->menutype) {
            if ($request->menutype == '1') {

                $filedestinatinon = public_path('admin/upload/menu/') . $menu->fileupload;
                if (file_exists($filedestinatinon) && is_file($filedestinatinon)) {
                    unlink($filedestinatinon);
                }
                $menu->fileupload = null;
                $menu->url = null;
                $menu->keyword =  $request->keyword;
                $menu->description =  $request->description;

                //image upload
                if (isset($request->image)) {
                    $newimage = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('admin/upload/menu'), $newimage);
                    $imagedestination = public_path('admin/upload/menu/') . $menu->image;
                    if (file_exists($imagedestination) && is_file($imagedestination)) {
                        unlink($imagedestination);
                    }
                    $menu->image =  $newimage;
                    //dd($notification->image);
                }
            } else if ($request->menutype == '3') {
                $imagedestination = public_path('/admin/upload/menu/') . $menu->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $filedestinatinon = public_path('admin/upload/menu/') . $menu->fileupload;
                if (file_exists($filedestinatinon) && is_file($filedestinatinon)) {
                    unlink($filedestinatinon);
                }
              
                $menu->keyword =  null;
                $menu->description =  null;
                $menu->image =  null;
                $menu->fileupload =  null;
                $menu->url =  $request->url;
                $menu->menutype =  $request->menutype;
            } else if ($request->menutype == '2') {
                $imagedestination = public_path('admin/upload/menu/') . $menu->image;
             //dd($imagedestination);
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                    //dd($imagedestination);
                }
            
                $menu->url = null;
                $menu->keyword =  null;
                $menu->description =  null;
                $menu->image =  null;
                $menu->menutype = $request->menutype;
                if (isset($request->fileupload)) {
                    $newfileupload = time() . '.' . $request->fileupload->extension();
                    $request->fileupload->move(public_path('/admin/upload/menu'), $newfileupload);
                    $filedestinatinon = public_path('admin/upload/menu/') . $menu->fileupload;
                    //dd($newfileupload);
                    //dd($filedestinatinon);

                    // dd($request->all());
                    if (file_exists($filedestinatinon) && is_file($filedestinatinon)) {
                        unlink($filedestinatinon);
                    }

                    $menu->fileupload =  $newfileupload;
                     // dd($menu);
                }
            }
            //dd($notification);
            $menu->menutype =  $request->menutype;
            // dd($notification);
        }
 
        //banner image
        if (isset($request->banner_image)) {
            $file = $request->file('banner_image');
            $newbanner = date('YmdHis') . '.' . $request->banner_image->getClientOriginalExtension();
            //dd($banner_image);
            $file->move(public_path('admin/upload/menu/banner'), $newbanner);

            $bannerdestination = (public_path('admin/upload/menu/banner/') . $menu->banner_image);
            if (file_exists($bannerdestination) && is_file($bannerdestination)) {
                unlink($bannerdestination);
            }

            $menu->banner_image =  $newbanner;
        }

        // print("hi");
        //dd($menu);

        $result = $menu->save();
        // dd($result);
        // print("hi");

        // Check if the save operation was successful
        if ($result) {
            return redirect('/admin/menu')->withSuccess('Menu detail updated successfully!');
        } else {
            return redirect('/admin/menu')->withError('Menu detail not updated successfully!');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $menu = Menu::find($id);

        // dd($notification);
        if (!$menu) {
            return redirect('/admin/menu')->withError('Menu detail not found.');
        }

        $image_path = public_path('admin/upload/menu/') . $menu->image;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $fileupload_path = public_path('admin/upload/menu/') . $menu->fileupload;
        if (file_exists($fileupload_path) && is_file($fileupload_path)) {
            unlink($fileupload_path);
        }

        $banner_path = public_path('admin/upload/menu/banner/') . $menu->banner_image;
        if (file_exists($banner_path) && is_file($banner_path)) {
            unlink($banner_path);
        }

        $menu->delete();

        return redirect('/admin/menu')->withSuccess('Menu detail deleted Successfully!!!');
    }
}
