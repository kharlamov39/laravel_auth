<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Group;
use App\Models\Unit;

class DishController extends Controller
{
    public function index(Request $request) 
    {
        $s = $request->s;
        $dishes = Dish::where('name', 'LIKE', '%' . $s . '%')->orderBy('sort')->get();
        return view('admin.dishes.index', ['dishes' => $dishes, 's' => $s]);
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
           'sort' => ['numeric'],
        ]);

        $dish = new Dish;
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->weight = $request->weight;
        $dish->weight_unit_id = $request->weight_unit_id;
        $dish->amount = $request->amount;
        $dish->amount_unit_id = $request->amount_unit_id;
        $dish->group_id = $request->group_id;
        $dish->active = $request->has('active') ? 1 : 0;
        $dish->spicy = $request->has('spicy') ? 1 : 0;
        $dish->sort = $request->sort;
        $dish->img = '/';
        $dish->save(); 

        return redirect()->route('admin.dishes.index');
    }

    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        return view('admin.dishes.edit', ['dish' => $dish]);
    }

    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);

        $request->validate([
            
        ]);


        return redirect()->route('admin.dishes.index');
    }

    public function delete($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }
}
