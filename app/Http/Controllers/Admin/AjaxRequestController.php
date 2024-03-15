<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Menu;
use App\Models\Admin\PhotoGallery;
use App\Models\Admin\PhotoCategory;
use App\Models\Admin\Rule;
use App\Models\Admin\Slider;
<<<<<<< HEAD
=======
use App\Models\Admin\Winner;
use App\Models\Admin\HomeGallery;
>>>>>>> ded4fed4be212a719f838e32e5007a0402a708a6
use App;
class AjaxRequestController extends Controller
{
   // function for get primary menu on ajax request created by laukesh suraj
   // clean_single_input is helpers function for remove html tags for input/request
     public function update_galleryCat_orders(Request $request)
     {
         $msg=array();
         $create="";
         if($request->ajax())
         {
             $id= clean_single_input( $request->id);
           
             if($request->update_galleryCat_orders=='update_galleryCat_orders'){
                $pArray['cat_postion'] =clean_single_input($request->cat_postion);
                $data = PhotoCategory::where('id', $id)->first();
                // dd($data);
                if($data->cat_postion!==$request->cat_postion){
    
                    $create 	= PhotoCategory::where('id', $id)->update($pArray);
                    $msg['success']='This Postion is Updated';
                }else{
                    $msg['error']='This Postion Alredy Taken';
                }
                 
            }elseif($request->update_infraimg_orders=='update_infraimg_orders'){
                $pArray['img_postion'] =clean_single_input($request->img_postion);
                $data = Photoinfra::where('id', $id)->first();
                // dd($data);
                if($data->img_postion!==$request->img_postion){
    
                    $create 	= Photoinfra::where('id', $id)->update($pArray);
                    $msg['success']='This Postion is Updated';
                }else{
                    $msg['error']='This Postion Alredy Taken';
                }
            }elseif($request->update_infrastructure_orders=='update_infrastructure_orders'){
                $pArray['infrastructure_postion'] =clean_single_input($request->infrastructure_postion);
                $data = infrastructures::where('id', $id)->first();
                
                if($data->infrastructure_postion!==$request->infrastructure_postion){
    
                    $create 	= infrastructures::where('id', $id)->update($pArray);
                    // dd($create);
                    $msg['success']='This Postion is Updated';
                }else{
                    $msg['error']='This Postion Alredy Taken';
                }
            
            }else{
                $pArray['img_postion'] =clean_single_input($request->img_postion);
                $data = PhotoGallery::where('id', $id)->first();
                // dd($data);
                if($data->img_postion!==$request->img_postion){
    
                    $create 	= PhotoGallery::where('id', $id)->update($pArray);
                    $msg['success']='This Postion is Updated';
                }else{
                    $msg['error']='This Postion Alredy Taken';
                }

            }
             $lastInsertID = $id;
             $user_login_id=Auth()->user()->id;
 
             if($create > 0){
                 $audit_data = array('user_login_id'     =>  $user_login_id,
                                 'page_id'           	=>  $lastInsertID,
                                 'page_name'             =>  clean_single_input($data->menu_title),
                                 'page_action'           =>  'Update',
                                 'page_category'         =>  clean_single_input($data->m_type),
                                 'lang'                  =>  1,
                                 'page_title'        	=> 'Gallary Model',
                                 'approve_status'        => '',
                                 'usertype'          	=> 'Admin'
                             );
                 // audit_trail is helpers function for insert menu orders  on ajax request  in audit_trail table created by laukesh 			
                 //web_logs($audit_data);
                 echo json_encode($msg);
                 die();
                         
             }
         }
         
     }
     // function for update Slider orders  on ajax request created by laukesh 
  
    Public function delete_images(Request $request)
    {
        $data=explode(',',$request->rowid);
         $imgname=$data[0];
         $geid=$data[1];
         $data = Photogallery::where('id', $geid)->select('img')->first();
         $olddata= explode(",",$data->txtuplode);
         if (($key = array_search($imgname, $olddata)) !== false) {
            unset($olddata[$key]);
        }
         $inputdata= implode(",",$olddata);
         $pArray['img']  	= !empty($inputdata)?$inputdata:'';
         $res= Photogallery::where('id', $geid)->update($pArray);

         $imguplode1 ='upload/admin/cmsfiles/photo/'.$imgname; //die();
               echo   $imguplode1;
               echo "<br>";    
                     if (file_exists($imguplode1)) {
                         unlink($imgname);
                     }
                     
         if(!empty($res)){
            $newdata = Photogallery::where('id', $geid)->select('img')->first();
            echo json_encode( $newdata);
         }else{
            $error="Some error";
         }
         Photogallery::where('id',  $geid)->delete();
       die();
    }
    public function update_rules_orders(Request $request)
    {
        $msg=array();
        if($request->ajax())
        {
            $id= clean_single_input( $request->id);
               $pArray['order'] =clean_single_input($request->rule_postion);
               $data = Rule::where('id', $id)->first();
               if($data->rule_postion!==$request->rule_postion){
                   $create 	= Rule::where('id', $id)->update($pArray);
                   $msg['success']='This Postion is Updated';
               }else{
                   $msg['error']='This Postion Alredy Taken';
               }
            $lastInsertID = $id;
            $user_login_id=Auth()->user()->id;
            if($create > 0){
                echo json_encode($msg);
                die();
                        
            }
        }
        
    }
    public function update_slider_orders(Request $request)
    {
        $msg=array();
        if($request->ajax())
        {
            $id= clean_single_input( $request->id);
               $pArray['order'] =clean_single_input($request->slider_postion);
               $data = Slider::where('id', $id)->first();
               if($data->order!==$request->slider_postion){
                   $create 	= Slider::where('id', $id)->update($pArray);
                   $msg['success']='This Postion is Updated';
               }else{
                   $msg['error']='This Postion Alredy Taken';
               }
            $lastInsertID = $id;
            $user_login_id=Auth()->user()->id;
            if($create > 0){
                echo json_encode($msg);
                die();
                        
            }
        }
        
    }
    public function update_home_gallery_orders(Request $request)
    {

        $msg=array();
        if($request->ajax())
        {
            $id= clean_single_input( $request->id);
               $pArray['order'] =clean_single_input($request->gallery_postion);
               $data = HomeGallery::where('id', $id)->first();
               if($data->order!==$request->gallery_postion){
                   $create 	= HomeGallery::where('id', $id)->update($pArray);
                   $msg['success']='This Postion is Updated';
               }else{
                   $msg['error']='This Postion Alredy Taken';
               }
            $lastInsertID = $id;
            $user_login_id=Auth()->user()->id;
            if($create > 0){
                echo json_encode($msg);
                die();
                        
            }
        }
        
    }
    public function update_gallery_orders(Request $request)
    {
        $msg=array();
        if($request->ajax())
        {
            $id= clean_single_input( $request->id);
               $pArray['cat_postion'] =clean_single_input($request->gallery_postion);
               $data = PhotoCategory::where('id', $id)->first();
               if($data->cat_postion!==$request->gallery_postion){
                   $create 	= PhotoCategory::where('id', $id)->update($pArray);
                   $msg['success']='This Postion is Updated';
               }else{
                   $msg['error']='This Postion Alredy Taken';
               }
            $lastInsertID = $id;
            $user_login_id=Auth()->user()->id;
            if($create > 0){
                echo json_encode($msg);
                die();
                        
            }
        }
        
    }
}
