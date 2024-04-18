<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function index() 
    {
        $groups = Group::orderBy('sort')->get();
        return view('admin.groups.index', ['groups' => $groups]);
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {    
        $request->validate([
            'section' => 'required|string',
            'sort' => 'required|numeric'
        ]);

        $group = new Group;
        $group->section = $request->section;
        $group->sort = $request->sort;
        $group->active = $request->has('active') ? 1 : 0;
        $group->save(); 

        return redirect()->route('admin.groups.index');
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('admin.groups.edit', ['group' => $group]);
    }

    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $request->validate([
            'section' => 'required|string',
            'sort' => 'required|numeric'
        ]);

        $group->section = $request->section;
        $group->sort = $request->sort;
        $group->active = $request->has('active') ? 1 : 0;
        $group->save();

        return redirect()->route('admin.groups.index');
    }

    public function delete($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('admin.groups.index');
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $groups = Group::where('section', 'LIKE', '%' . $s . '%')->orderBy('sort')->get();
        return view('admin.groups.index', ['groups' => $groups, 's' => $s]);
    }
}
