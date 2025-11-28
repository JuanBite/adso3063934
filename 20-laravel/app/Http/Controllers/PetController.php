<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        // $users = User::paginate(20);
        $pets = Pet::orderBy('id', 'desc')->paginate(15);
        // dd($users->toArray());
        return view('pets.index')->with('pets', $pets);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pets.show')->with('pet', $pet);
    }

    public function search (Request $request)
    {
            $pets = Pet::names($request->q)->paginate(15);
            return view('pets.search')->with('pets', $pets);
    }
}
