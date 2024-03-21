<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Event List";
        $data = Event::all();
        return view('admin.event.event', ['events'=>$data,'title' => $title]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Event";
        return view('admin.event.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'Required',
            'date' => 'Required',
            'location' => 'Required', 
            'description' => 'Required',
            'image' => 'Required'
        ]);
        if(isset($request->image)){
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('/admin/upload/event'), $image);
        }
        $event = new Event;
        $event->title = $request->title;
        $event->sub_title = $request->sub_title;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->image =  $image;
        $result = $event->save();
        if ($result) {
            return redirect('/admin/event')->withSuccess('Event added successfully!');
        } else {
            return redirect('/admin/event')->withError('Unable to add event!');
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
        $title = "Edit Event";
        $data = Event::find($id);
        return view('admin/event/edit', ['events' => $data], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->cmdsubmit)) {
           
            $request->validate([
                'title' => 'Required',
                'date' => 'Required',
                'location' => 'Required', 
                'description' => 'Required',
                //'image' => 'Required | image | mimes:jpeg,jpg,png,webp | max:2048'
            ]);
            $event = Event::find($id);
            
            //check if event is available or not
            if (!$event) {
                return redirect('/admin/event')->with('error', 'Event not found.');
            }
             $event->title = $request->title;
            $event->sub_title = $request->sub_title;
            $event->date = $request->date;
            $event->location = $request->location;
            $event->description = $request->description;
            // Validate and store the new image
            if (isset($request->image)) {
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/admin/upload/event/'), $newImageName);
                $destination = public_path('/admin/upload/event/') . $event->image;
                if (file_exists($destination)) {
                    unlink($destination);
                }
                $event->image = $newImageName;
            }
           $result =  $event->save();
            return redirect('/admin/event')->withSuccess('Event detail updated Successfully!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        if (!$event) {
            return redirect('/admin/event')->withError('Event not found.');
        }        
        $event->delete();
        
        return redirect('/admin/event')->withSuccess('Event detail deleted Successfully!!!');
    }
}


    

