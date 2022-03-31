<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;

class UserController extends Controller
{
    public function show($id)
    {
        return view('profile.show', [
            'images' => Image::all()->where('userId', $id),
            'user' => User::find($id),
        ]);
    }
}
