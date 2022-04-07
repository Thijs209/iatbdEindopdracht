<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\PetImage;
use App\Models\Banner;
use App\Models\Animal;

class PetController extends Controller
{
    public function show($petId)
    {
        return view('pets.show',[
            'pet' => Pet::all()->where('petId', $petId)->first(),
            'images' => PetImage::all()->where('petId', $petId)
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

    public function create()
    {
        return view('pets.create', [
            'animals' => Animal::all(),
        ]);
    }

    public function createImages($petId)
    {
        return view('pets.create-images',[
            'pet' => Pet::all()->where('petId', $petId)->first(),
        ]);
    }

    public function store(Request $request, Pet $pet, PetImage $petImage)
    {
        $pet->petName = $request->input('petName');
        $pet->petType = $request->input('petType');
        $pet->description = $request->input('description');
        $pet->breed = $request->input('breed');
        $pet->payment = $request->input('payment');
        $pet->startDate = $request->input('startdate');
        $pet->enddate = $request->input('enddate');
        $pet->important = $request->input('imporant');
        $pet->description = $request->input('description');
        $id = abs(crc32(uniqid()));
        $pet->petId = $id;

        try{
            $pet->save();
            return \redirect('/petprofile/images/'.$id);
        } catch(Exception $e){
            return redirect('/petprofile');
        }

    }

    public function uploadImages($petId, Request $request, Pet $pet, PetImage $petImage) {
        $uploadFileIndex = 0;
        // $data = Pet::where('petId', Auth::user()->id)->get()->first()->images);

        if($request->hasfile('images')){
            \error_log('fsdfgdfsgdfsfgjiofdjgodfjgodjfgoidsfgijsfdiogjiogdfsio');
            foreach ($request->file('images') as $file) {
                $filename = date('YmdHis').$uploadFileIndex.$file->getClientOriginalName();
                $file->move('img/pets', $filename);
    
                $uploadFileIndex++;

                $petImage->image = $filename;
                $petImage->petId = $petId;

                try{
                    $petImage->save();
                    return \redirect('/pets');
                } catch(Exception $e){
                    return redirect('/petprofile/images/'.$petId);
                }
            }
        }
        return redirect('/petprofile/images/'.$petid);
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
