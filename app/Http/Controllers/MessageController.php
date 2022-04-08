<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use DB;

class MessageController extends Controller
{
    public function index()
    {
        return view('messages', [
            'messages' => Response::all()->where('ownerId', auth()->user()->id),
        ]);
    }

    public function accept($id)
    {
        DB::update('update responses set accepted = true where id ='.$id);
        return redirect("/messages");
    }
}
