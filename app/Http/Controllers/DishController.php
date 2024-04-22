<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Group;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    public function index(Request $request) 
    {
        $s = $request->s;
        $perPage = $request->input('perPage', 10);
        $dishes = Dish::where('name', 'LIKE', '%' . $s . '%')->orderBy('sort')->paginate($perPage);
        $dishes->appends(['perPage' => $perPage]);
        return view('admin.dishes.index', ['dishes' => $dishes, 's' => $s, 'perPage' => $perPage]);
    }

    public function create()
    {
        $groups = Group::all();
        $units = Unit::all();
        return view('admin.dishes.create', compact('groups', 'units'));
    }

    public function store(Request $request)
    {    
        $request->validate([
           'name' => ['required', 'string'],
           'description' => ['string'],
           'price' => ['required', 'numeric'],
           'sort' => ['required', 'numeric'],
           'img' => ['image']
        ]);

        $dish = new Dish;
        $data = $request->only(['name', 'description', 'price', 'weight', 'weight_unit_id', 'amount', 'amount_unit_id', 'group_id', 'sort']);
        $data['active'] = $request->has('active') ? 1 : 0;
        $data['spicy'] = $request->has('spicy') ? 1 : 0;
        $data['sort'] = $request->sort;
        $data['img'] = '/';
        $files = json_decode($request->input('hidden-images'), true);
        $data['files'] = serialize($files);

        if($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('dishes', 'public');
            $data['img'] = Storage::url($imagePath);
        }

        $dish->fill($data)->save(); 

        return redirect()->route('admin.dishes.index');
    }

    public function edit($id)
    {
        $groups = Group::all();
        $units = Unit::all();
        $dish = Dish::findOrFail($id);
        return view('admin.dishes.edit', compact('groups', 'units', 'dish'));
    }

    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string'],
            'price' => ['required', 'numeric'],
            'sort' => ['required', 'numeric'],
        ]);

        $data = $request->only(['name', 'description', 'price', 'weight', 'weight_unit_id', 'amount', 'amount_unit_id', 'group_id', 'sort']);
        $data['active'] = $request->has('active') ? 1 : 0;
        $data['spicy'] = $request->has('spicy') ? 1 : 0;
        $data['sort'] = $request->sort;
        $data['img'] = '/';
        $files = json_decode($request->input('hidden-images'), true);
        $data['files'] = serialize($files);

        if($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('dishes', 'public');
            $data['img'] = Storage::url($imagePath);
        }

        $dish->fill($data)->save(); 

        return redirect()->route('admin.dishes.index');
    }

    public function delete($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }

    public function uploadImages(Request $request) 
    {
        $paths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $image) {
                $path = $image->store('dishes', 'public');
                $paths[] = Storage::url($path);
            }
        }

        return response()->json(['paths' => $paths]);
    }
}
