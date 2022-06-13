<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routeController extends Controller
{
    public function backToPrevious()
    {
        return redirect()->back();
    }
}
