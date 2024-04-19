<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Dish;

class GroupController extends Controller
{
    public function index(Request $request) 
    {
        $s = $request->s;
        $groups = Group::where('section', 'LIKE', '%' . $s . '%')->orderBy('sort')->get();
        foreach ($groups as $group) {
            $group->dish_count = Dish::where('group_id', $group->id)->count();
        }
        return view('admin.groups.index', ['groups' => $groups, 's' => $s]);
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
        $data = $request->only(['section', 'sort']);
        $data['active'] = $request->has('active') ? 1 : 0;

        $group->fill($data)->save(); 

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

        $data = $request->only(['section', 'sort']);
        $data['active'] = $request->has('active') ? 1 : 0;

        $group->fill($data)->save(); 

        return redirect()->route('admin.groups.index');
    }

    public function delete($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('admin.groups.index');
    }
}
