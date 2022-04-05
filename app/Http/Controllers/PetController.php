<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\PetImage;
use App\Models\Banner;
use App\Models\Animal;

class PetController extends Controller
{
    public function show($id)
    {
        return view('pets.show',[
            'pet' => Pet::find($id),
            'images' => PetImage::all()->where('petId', $id)
        ]);
    }
    
    public function index()
    {
        return view('pets.index', [
            'pets' => Pet::all(),
            'animals' => Animal::all(),
        ]);
    }

    public function home()
    {
        return view('welcome', [
            'animals' => Animal::all(),
        ]);
    }
}
