<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TopperStudent ;
use App\Models\Admin\TopperStudentImage;

class TopperStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Topper Student List';
        $data=TopperStudent::all();
        return view('admin.topperstudent.index',['data'=>$data,'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add Topper Student';
        return view('admin.topperstudent.create',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        if(isset($request->cmdsubmit)){
            $validator=$request->validate([
                'title'=>'Required',
                'pdf'=>'Required',
            ]);
            $topper_student=new TopperStudent;
            $topper_student->title=$request->title;
            if (isset($request->pdf)) {
                $image = $request->file('pdf');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/admin/upload/topperstudent/pdf/'), $newImageName);
                $destination = public_path('/admin/upload/topperstudent/pdf/') . $topper_student->pdf;
                // if (file_exists($destination)) {
                //     unlink($destination);
                // }
                $topper_student->pdf = $newImageName;
            }
           
            $result=$topper_student->save();
           if($result) {
              $last_id = $topper_student->id;
              if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $image_name = $image->getClientOriginalName();
                    $image_model = new TopperStudentImage;
                    $image_model->student_id = $last_id; 
                    $image_model->image = $image_name;
                    $image->move(public_path('/admin/upload/topperstudent/image/'), $image_name); 
                   $response=   $image_model->save();
                }
            }
        }
        if($response){
            return redirect('/admin/topperstudent')->withSuccess('Topper Student added Successfully!!!');
        } else {
             return redirect('/admin/topperstudent')->withError('Unable to add Topper Student!');
        }
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list=TopperStudentImage::where('student_id',$id)->select('*')->paginate(10);
        $title="Student List";
        return view('admin.topperstudent.student_images',compact(['title','list']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Topper Student";
        $data = TopperStudent::find($id);
        return view('admin.topperstudent.edit', ['data' => $data,'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->cmdsubmit)) {
            $request->validate([
                'title' => 'Required',
            ]);
            $topper_student = TopperStudent::find($id);
            if (!$topper_student) {
                return redirect('/admin/topperstudent')->with('error', 'Topper Student not found.');
            }
            // Check if any changes are made
            if ($topper_student->title == $request->title  && !$request->hasFile('pdf')) {
                return redirect('/admin/topperstudent')->withSuccess('No changes made.');
            }
            $topper_student->title = $request->title;
            // Validate and store the new image
            if (isset($request->pdf)) {
                //$newImageName = null;
                $pdf = $request->file('pdf');
                $newpdfName = time() . '.' . $pdf->getClientOriginalExtension();
                $pdf->move(public_path('/admin/upload/topperstudent/pdf/'), $newpdfName);
                $destination = public_path('/admin/upload/topperstudent/pdf/') . $topper_student->pdf;
                if (file_exists($destination)) {
                    unlink($destination);
                }
                $topper_student->pdf = $newpdfName;
            }
           $result =  $topper_student->save();
            return redirect('/admin/topperstudent')->withSuccess('Topper Student updated Successfully!!!');  
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $topperstudent= TopperStudent::find($id);
       $image_path = public_path('/admin/upload/topperstudent/pdf/') . $topperstudent->pdf;
        if (file_exists($image_path)) {
            unlink($image_path); 
        }
        $images = TopperStudentImage::where('student_id', $id)->get();
        foreach ($images as $image) {
            $image_path = public_path('/admin/upload/topperstudent/image/') . $image->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image->delete();
        }
         $topperstudent->delete();
           return redirect('admin/topperstudent')->with('success','Gallery deleted successfully');
    }
}
