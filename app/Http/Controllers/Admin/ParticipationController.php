<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Participation;
use App\Http\Controllers\Controller;

class ParticipationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Participation";
        $data = Participation::orderBy('created_at', 'desc')->get();
        return view('admin.participation.participation', ['participations' => $data], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Participation Exam";
        return view('admin.participation.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'title' => 'required',
            'year' => 'required',
        ]);

        $participation = new participation;
        $participation->title = $request->title;
        $participation->year = $request->year;

        $result = $participation->save();

        if ($result) {
            return redirect('admin/participation')->withSuccess('Participation Exam detail added successfully!');
        } else {
            return redirect('admin/participation')->withError('Participation Exam detail not added successfully!');
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
        $title = "Edit Participation Exam";
        $data = Participation::find($id);
        return view('admin/participation/edit', ['participations' => $data, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = $request->validate([
            'title' => 'required',
            'year' => 'required',
        ]);

        //find id
        $participation = Participation::find($id);

        //if not than show error msf
        if (!$participation) {
            return redirect('/admin/participation')->withError('participation detail not found.');
        }

        //update data
        $participation->title = $request->title;
        $participation->year = $request->year;

        $result = $participation->save();

        if ($result) {
            return redirect('admin/participation')->withSuccess('Participation Exam detail updated successfully!');
        } else {
            return redirect('admin/participation')->withError('Participation Exam detail not updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $participation =  Participation::find($id);

        //if not than show error msf
        if (!$participation) {
            return redirect('/admin/participation')->withError('Participation detail not found.');
        }

        $result = $participation->delete();
        if ($result) {
            return redirect('admin/participation')->withSuccess('Participation Exam detail deleted successfully!');
        } else {
            return redirect('admin/participation')->withError('participation Exam detail not deleted successfully!');
        }
    }
}
