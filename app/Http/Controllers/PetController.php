<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\PetImage;
use App\Models\Banner;
use App\Models\Animal;
use App\Models\User;
use App\Models\Response;
use DB;

class PetController extends Controller
{
    public function show($petId)
    {
        return view('pets.show',[
            'pet' => Pet::all()->where('petId', $petId)->first(),
            'sent' => 'false',
            'images' => PetImage::all()->where('petId', $petId)
        ]);
    }

    public function sent($petId)
    {
        return view('pets.show',[
            'pet' => Pet::all()->where('petId', $petId)->first(),
            'images' => PetImage::all()->where('petId', $petId),
            'sent' => 'true'
        ]);
    }

    public function index()
    {
        return view('pets.index', [
            'pets' => Pet::all(),
            'animals' => Animal::all(),
            'petsImages' => PetImage::all(),
        ]);
    }

    public function home()
    {
        return view('welcome', [
            'animals' => Animal::all(),
        ]);
    }

    public function create()
    {
        return view('pets.create', [
            'id' => abs(crc32(uniqid())),
            'animals' => Animal::all(),
        ]);
    }

    public function edit($id)
    {
        return view('pets.create', [
            'id' => $id,
            'pet' => Pet::all()->where('petId', $id)->first(),
            'animals' => Animal::all(),
        ]);
    }

    public function createImages($petId)
    {
        return view('pets.create-images',[
            'saved' => 'false',
            'pet' => Pet::all()->where('petId', $petId)->first(),
            'images' => PetImage::all()->where('petId', $petId)
        ]);
    }

    public function created($petId)
    {
        return view('pets.create-images',[
            'pet' => Pet::all()->where('petId', $petId)->first(),
            'images' => PetImage::all()->where('petId', $petId),
            'saved' => 'true',
        ]);
    }

    public function respond($id, Request $request, Response $response)
    {
        $response->sitterId = \auth()->user()->id;
        $response->sitterName = auth()->user()->name;
        $response->petId = $id;
        $response->ownerId = Pet::all()->where('petId', $id)->first()->ownerId;
        $response->message = $request->input('message');

        try{
            $response->save();
            return \redirect('/pets/show/sent/'.$id);
        } catch (Exception $e){
            return \redirect('/pets/show/'.$id);
        }
    }

    public function store($id, Request $request, Pet $pet, PetImage $petImage, User $user)
    {
        
        $pet->petName = $request->input('petName');
        $pet->petType = $request->input('petType');
        $pet->description = $request->input('description');
        $pet->breed = $request->input('breed');
        $pet->payment = $request->input('payment');
        $pet->ownerName = auth()->user()->name;
        $pet->ownerId = auth()->user()->id;
        $pet->startDate = $request->input('startdate');
        $pet->endDate = $request->input('enddate');
        $pet->important = $request->input('important');
        $pet->description = $request->input('description');
        $pet->petId = $id;

        try{
            if(Pet::all()->where("petId", $id)->first() == null){
                $pet->save();
            }else{
                Pet::all()->where("petId", $id)->first()->update([
                    'petName' => $request->input('petName'),
                    'petType' => $request->input('petType'),
                    'description' => $request->input('description'),
                    'breed' => $request->input('breed'),
                    'payment' => $request->input('payment'),
                    'startDate' => $request->input('startDate'),
                    'endDate' => $request->input('enddate'),
                    'important' => $request->input('important'),
                    'description' => $request->input('description'),
                ]);
            }

            return \redirect('/petprofile/images/'.$id);
        } catch(Exception $e){
            return redirect('/petprofile');
        }

    }

    public function uploadImages($petId, Request $request, Pet $pet, PetImage $petImage) {
        $i = 0;
        if($request->hasfile('images')){
            foreach ($request->file('images') as $file) {
                $file = $request->file('images');
                $name = '/img/pets/'.\uniqid().$file[$i]->getClientOriginalName();
                $file[$i]->move('img/pets', $name);
    
                $i++;

                $petImage->image = $name;
                $petImage->petId = $petId;

                try{
                    DB::table('pets_images')->insert([
                        'image' => $name,
                        'petId' => $petId
                    ]);
                    $pet::where('petId', $petId)->update(['image' => $name]);
                } catch(Exception $e){
                    return redirect('/petprofile/images/'.$petId);
                }
            }
            return \redirect('/petprofile/images/saved/'.$petId);
        }
        return redirect('/petprofile/images/saved/'.$petId);
    }

    // public function deleteImage(Request $request, \App\Models\Sitter $sitter){
    //     $data = json_decode(\App\Models\Sitter::where('user_id', Auth::user()->id)->get()->first()->images, true);
    //     $file_path = 'img/sitterImages/';
    //     $index = 0;

    //     foreach ($data as $image) {
    //         if($request->image == $image){
    //             \array_splice($data, $index, 1);
    //             unlink($file_path.$image);
    //         }
    //         $index++;
    //     }
    //     $sitter::where('user_id', Auth::user()->id)->update(['images' => json_encode($data)]);

    //     return redirect('/account');
    // }
}
