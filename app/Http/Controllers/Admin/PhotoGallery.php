<?php

namespace App\Http\Controllers\admin;
use App\Models\Admin\PhotoGallery as Photo;
use App\Models\Admin\PhotoCategory as Photocate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PhotoGallery extends Controller
{  /**
    * Display a listing of the resource.
    */
   public function index()
   {
     $sertitle=Session::get('cattitle');
     if (!empty($sertitle)) {
        $list=Photocate::where('title', 'LIKE', "%{$sertitle}%")->orderBy('cat_postion', 'ASC')->select('*')->paginate(10);
       
    }else{

       $list=Photocate::where('parent_id',0)->orderBy('cat_postion', 'ASC')->select('*')->paginate(10);
    } 
    
       $title="Gallery List";
       return view('admin/photoGallery/index',compact(['title','list']));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       $title="Add Gallery";
       return view('admin/photoGallery/create',compact('title'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request): mixed {
      if(isset($request->search)){
        $cattitle=clean_single_input(trim($request->cattitle));
         Session::put('cattitle', $cattitle);
         return redirect('admin/photoGallery');
       }
       if(isset($request->cmdsubmit)){
        $txtuplode1 ='';
         $rules = array(
           'title' => 'required|max:64',
           'parent_id' => 'required',
       );
       $valid
       =array(
            'title.required'=>'Category name field  is required',
            'parent_id.required'=>'Main Catogory field  is required'
       );
       $validator = Validator::make($request->all(), $rules,$valid);     
           if (!empty($request->thumbnail)){
                if (!is_dir('admin/upload/photoGallery/thumbnail')) {
                    mkdir('/admin/upload/photoGallery/thumbnail', 0777, TRUE);
                }
                $txtuplode1 = str_replace(' ','_',clean_single_input($request->title)).'_thumbnail'.'.'.$request->thumbnail->extension();  
                    $res= $request->thumbnail->move(public_path('admin/upload/photoGallery/thumbnail'), $txtuplode1);
                    if($res){
                    $txtuplode1 =$txtuplode1;
                    }
                    $txtuplode2 ='admin/upload/photoGallery/thumbnail'.$txtuplode1; //die();
                    if (file_exists($txtuplode2)) {
                        unlink($txtuplode2);
                    }
          }
       if ($validator->fails()) {
           return redirect('admin/photoGallery/create')->withErrors($validator)->withInput();
       }else{
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;


            $pArray['title']    					= clean_single_input($request->title); 
            $pArray['parent_id']    				= clean_single_input($request->parent_id); 
            $pArray['gallery_type']    				= clean_single_input($request->type); 
             $pArray['thumbnail']    			    = clean_single_input($txtuplode1); 
            $pArray['cat_descriptions']    			 = $request->cat_descriptions; 
         
            // dd($pArray);
            $create 	= Photocate::create($pArray);
            $lastInsertID = $create->id;
            $user_login_id=Auth()->user()->id;
           if($lastInsertID > 0){
                if(!empty($request->file('image'))){
                   foreach ($request->file('image') as $imagefile) {
                  $photoDir = public_path('admin/upload/photoGallery/photo');
                  if (!is_dir($photoDir)) {
                      mkdir($photoDir, 0777, true);
                  }
                  $txtuplode11 = str_replace(' ', '_', clean_single_input($request->title)) . 'photo' . '_' . $imagefile->getClientOriginalName();
                 $res=$imagefile->move($photoDir, $txtuplode11);
                        if($res){
                            $txtuplode11 =$txtuplode11;
                        }
                        $txtuplode2 ='admin/upload/photoGallery/photo/'.$txtuplode11; 
                        if($res){
                            $dataArr['event_id']  				    = clean_single_input($lastInsertID);
                            $dataArr['img']  				        = clean_single_input($txtuplode11);
                            $dataArr['parent_id']    				= clean_single_input($request->parent_id);
                            Photo::create($dataArr);      
                        } 
                }
            }
               return redirect('admin/photoGallery')->with('success','Gallery has successfully added');
           }
          
       }
   
     
    }
}


   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
    $list=Photocate::where('parent_id',$id)->orderBy('cat_postion', 'ASC')->select('*')->paginate(10);
      
    $title="Gallery List";
    return view('admin/photoGallery/index',compact(['title','list']));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
       //
       $id=clean_single_input($id);
       $title="Edit Photo";
       $data = Photocate::find($id);
       //dd( $data);
       $gimg =  Photo::where('event_id',$id)->orderBy('img_postion', 'ASC')->paginate(20);
       return view('admin/photoGallery/edit_photo',compact(['title','data','gimg']));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
       if(isset($request->cmdsubmit)){
           $id= clean_single_input($id);
        $txtuplode1 ='';
         $rules = array(
           'title' => 'required|max:64',
           'parent_id' => 'required',
        );
        $valid
        =array(
             'title.required'=>'Category name field  is required',
             'parent_id.required'=>'Main Catogory field  is required'

        );

       }
       if (!empty($request->thumbnail)){
        if (!is_dir('admin/upload/photoGallery/thumbnail')) {
            mkdir('/admin/upload/photoGallery/thumbnail', 0777, TRUE);
        }
            $txtuplode1 = str_replace(' ','_',clean_single_input($request->title)).'_thumbnail'.'.'.$request->thumbnail->extension(); 
                $res= $request->thumbnail->move(public_path('admin/upload/photoGallery/thumbnail'), $txtuplode1);
                if($res){
                  $txtuplode1 =$txtuplode1;
                }
                $txtuplode2 ='admin/upload/photoGallery/thumbnail'.$txtuplode1; //die();
                
                if (file_exists($txtuplode2)) {
                    unlink($txtuplode2);
                }
        
        }else{
            $txtuplode1 =$request->olduplode;
        }
    
      $validator = Validator::make($request->all(), $rules,$valid);
       if ($validator->fails()) {
           return  back()->withErrors($validator)->withInput();
         //  return redirect('admin/Photo/edit')->withErrors($validator)->withInput();
       }else{
        $pArray['title']    					= clean_single_input($request->title); 
        $pArray['thumbnail']    					= clean_single_input($txtuplode1); 
        $pArray['parent_id']    					= clean_single_input($request->parent_id); 
        $pArray['gallery_type']    				= clean_single_input($request->type); 
        $pArray['cat_descriptions']    			     = $request->cat_descriptions;  
        $create 	= Photocate::where('id', $id)->update($pArray);
   // dd($request->file('image'));
      //  $lastInsertID = $create->id;$lastInsertID
        $user_login_id=Auth()->user()->id;
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $imagefile) {
         
                if (!is_dir('admin/upload/photoGallery/photo/')) {
                    mkdir('admin/upload/photoGallery/photo/', 0777, TRUE);
                }
                    
                    $txtuplode1 = str_replace(' ','_',clean_single_input($request->title)).'photo'.'_'.$imagefile->getClientOriginalName();;  
                    $res= $imagefile->move(public_path('admin/upload/photoGallery/photo/'), $txtuplode1);
                    if($res){
                        $txtuplode1 =$txtuplode1;
                    }
                    $txtuplode2 ='admin/upload/photoGallery/photo'.$txtuplode1; 
                    if (file_exists($txtuplode2)) {
                        unlink($txtuplode2);
                    }
                    $dataArr['event_id']  				    = clean_single_input($id);
                    $dataArr['parent_id']    				= clean_single_input($request->parent_id);
                    $dataArr['img']  				        = clean_single_input($txtuplode1);
                    //Photo::create($dataArr);     
                    Photo::create($dataArr);   
                //    $res= Photo::where('event_id', $id)->update($dataArr);
                //    if(empty($res)){
                //       Photo::create($dataArr);   
                //    }
                   
               // dd($dataArr); 
            }
        }
        if(!empty($request->oldimag)){
            foreach ($request->oldimag as $key => $name) {
                $old=$request->oldid[$key];
                $dataupArr['event_id']  				 = $id;
                $dataupArr['img']  				        = $name;
                //dd($dataupArr);
                Photo::where('id', $old)->update($dataupArr);
            }
        }
            if($create > 0){
                $dataArr = array();
            return redirect('admin/photoGallery')->with('success','Gallery has successfully added');
            }
        }
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
     //dd($Photocate);
     $Photocate= Photocate::where('id', $id)->delete();
      // $delete= $Photocate->delete();
       
       if($Photocate > 0){
           $detphoto=Photo::where('event_id', $id)->delete();
           $txtuplode2 ='uploads/admin/cmsfiles/photo/'.$detphoto; 
           if (file_exists($txtuplode2)) {
               unlink($txtuplode2);
           }
           $user_login_id=Auth()->user()->id;
           return redirect('admin/photoGallery')->with('success','Gallery deleted successfully');
       }
   }
}
