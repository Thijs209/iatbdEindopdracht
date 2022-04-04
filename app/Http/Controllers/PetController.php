<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function show($id)
    {
        return view('pets.show',[
            'pet' => Pet::find($id)
        ]);
    }
    
    public function index()
    {
        return view('pets.index', ['pets' => Pet::all()]);
    }

    public function home()
    {
        return view('welcome', ['pets' => Pet::all()]);
    }
}
