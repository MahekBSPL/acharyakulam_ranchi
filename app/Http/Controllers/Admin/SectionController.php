<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $title='Section List';
       $data=Section::all();
       return view('admin.section.section',['title'=>$title,'sections'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add Section';
        return view('admin.section.create',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=$request->validate([
            'title'=>'Required'
        ]);
        $section=new Section;
        $section->title=$request->title;
       $result= $section->save();
       if($result){
        return redirect('/admin/section')->withSuccess('Section added successfully!!!');
       }else{
        return redirect('/admin/section')->withErrors('Unable to added.');
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
        $title='Edit Section';
        $data=Section::find($id);
        return view('admin.section.edit',['sections'=>$data,'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
       if(isset($request->cmdsubmit)){
         $validator=$request->validate([
            'title'=>'Required'
         ]);
         $section=Section::find($id);
         $section->title=$request->title;
         $result=$section->save();
         if($result){
           return redirect('admin/section')->withSuccess('Section added successfully!!!');
         }else{
            return redirect('admin/section')->withErrors('Unable to add section!!!');
         }
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $section=Section::find($id);
       if(!$section){
            return redirect('admin/section')->withErrors('Section not found!');
       }
       $section->delete();
       return redirect('admin/section')->withSuccess('Section deleted successfully!!');
    }
}
