<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rule;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Rule List";
        $data = Rule::all();
        return view('admin.rule.rule', ['rules' => $data, 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Rule";
        return view('admin.rule.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'description' => 'Required',
        ]);
        $rule = new Rule;
        $rule->description = $request->description;
        $result = $rule->save();
        if ($result) {
            return redirect('/admin/rule')->withSuccess('Rule added Successfully!!!');
        } else {
            return redirect('/admin/rule')->withError('Unable to add rule');
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
        $title = "Edit Rule";
        $data = Rule::find($id);
        return view('admin/rule/edit', ['rules' => $data], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->cmdsubmit)) {
            $request->validate([
                'description' => 'Required',
            ]);
            $rule = Rule::find($id);
            if (!$rule) {
                return redirect('/admin/rule')->with('error', 'Rule not found.');
            }
            $rule->description = $request->description;
           $result =  $rule->save();
            return redirect('/admin/rule')->withSuccess('Rule updated Successfully!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rule = Rule::find($id);
        if (!$rule) {
            return redirect('/admin/rule')->withError('Rule not found.');
        }
        $rule->delete();
        return redirect('/admin/rule')->withSuccess('Rule deleted Successfully!!!');
    }
}
