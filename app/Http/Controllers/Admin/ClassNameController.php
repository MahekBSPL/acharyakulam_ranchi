<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ClassName;

class ClassNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title='Class List';
        $data=ClassName::all();
        return view('admin.class.class',['classes'=>$data,'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Class";
        return view('admin.class.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $validator = $request->validate([
            'title' => 'Required',
        ]);
        $class = new ClassName;
        $class->title = $request->title;
        $result = $class->save();
        if ($result) {
            return redirect('/admin/class')->withSuccess('Class added Successfully!!!');
        } else {
            return redirect('/admin/class')->withError('Unable to add class');
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
        $title='Edit Class';
        $data=ClassName::find($id);
        return view('admin.class.edit',['classes'=>$data,'title'=>$title]);
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
            $class = ClassName::find($id);
            if (!$class) {
                return redirect('/admin/class')->with('error', 'Class not found.');
            }
            $class->title = $request->title;
           $result =  $class->save();
            return redirect('/admin/class')->withSuccess('Class updated Successfully!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $class=ClassName::find($id);
    if(!$class){
        return redirect('/admin/class')->withError('Class not found.');
    }
    $class->delete();
    return redirect('/admin/class')->withSuccess('Class deleted successfully!!!');
    }
}
