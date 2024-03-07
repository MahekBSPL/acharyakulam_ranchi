<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\StudentCouncil;

class StudentCouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $title='Student Council List';
        $data=StudentCouncil::all();
        return view('admin.council.index',['councils'=>$data,'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add Student Council';
        return view('admin.council.create',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->cmdsubmit){
            $validator=$request->validate([
                'class'=>'Required',
                'section'=>'Required',
                'student_name'=>'Required',
                'about'=>'Required',
                'image'=>'Required',
            ]);
            if(isset($request->image)){
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/admin/upload/council'), $imageName);
            }
            $council=new StudentCouncil;
            $council->class=$request->class;
            $council->section=$request->section;
            $council->student_name=$request->student_name;
            $council->about=$request->about;
            $council->image=$imageName;
             $result=  $council->save();
             if($result){
                return redirect('/admin/council')->withSuccess('Student council added successfully!!!');
               }else{
                return redirect('/admin/council')->withErrors('Unable to add.');
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
        $title='Edit Student Council';
        $council = StudentCouncil::find($id);
        return view('admin.council.edit',['councils'=> $council,'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->cmdsubmit){
            $validator=$request->validate([
                'class'=>'Required',
                'section'=>'Required',
                'student_name'=>'Required',
                'about'=>'Required',
            ]);
            $council=StudentCouncil::find($id);
            if (isset($request->image)) {
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/admin/upload/council/'), $newImageName);
                $destination = public_path('/admin/upload/council/') . $council->image;
                if (file_exists($destination)) {
                    unlink($destination);
                }
                $council->image = $newImageName;
            }
            $council->class=$request->class;
            $council->section=$request->section;
            $council->student_name=$request->student_name;
            $council->about=$request->about;
             $result=  $council->save();
             if($result){
                return redirect('/admin/council')->withSuccess('Student council updated successfully!!!');
               }else{
                return redirect('/admin/council')->withErrors('Unable to update.');
               }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $council = StudentCouncil::find($id);
        if (!$council) {
            return redirect('/admin/council')->withError('Council not found.');
        }
        $image_path = public_path('/admin/upload/council/') . $council->image;
        if (file_exists($image_path)) {
            unlink($image_path);
            $council->delete();
        }
        
        return redirect('/admin/council')->withSuccess('Council detail deleted Successfully!!!');
    }
}
