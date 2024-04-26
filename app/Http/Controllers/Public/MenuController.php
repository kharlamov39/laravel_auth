<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Dish;

class MenuController extends Controller
{
    public function index() 
    {
        $groups = Group::with('dishes')->get();
        return view('public.index', ['groups' => $groups] );
    }

    public function basket()
    {
        return view('public.basket');
    }

}
