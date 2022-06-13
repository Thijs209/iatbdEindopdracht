<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProfileImage;
use App\Models\Review;
use DB;

class UserController extends Controller
{
    public function review($id)
    {
        return view('profile.review', ['id' => $id]);
    }

    public function storeReview($id, Request $request, Review $review){
        $review->review = $request->input('review');
        $review->ownerId = auth()->user()->id;
        $review->sitterId = $id;
        $review->ownerName = auth()->user()->name;

        try{
            $review->save();
            return \redirect('/profile/'.$id);
        } catch(Exception $e){
            return redirect('/review/'.$id);
        }
    }

    public function show()
    {
        return view('profile.show', [
            'images' => ProfileImage::all()->where('userId', auth()->user()->id),
            'user' => \auth()->user(),
            'ownProfile' => true,
            'reviews' => Review::all()->where('sitterId',auth()->user()->id)
        ]);
    }

    public function showto($id)
    {
        return view('profile.show', [
            'user' => User::find($id),
            'images' => ProfileImage::all()->where('userId', $id),
            'ownProfile' => false,
            'reviews' => Review::all()->where('sitterId',$id)
        ]);
    }

    public function create()
    {
        return view('profile.create',[
            'user' => auth()->user(),
        ]);
    }

    public function createImages($id)
    {
        return view('profile.create-images',[
            'saved' => 'false',
            'user' => User::all()->where('id', $id)->first(),
            'images' => ProfileImage::all()->where('userId', $id)
        ]);
    }

    public function created($petId)
    {
        return view('profile.create-images',[
            'user' => auth()->user(),
            'images' => ProfileImage::all()->where('userId', auth()->user()->id),
            'saved' => 'true',
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->description = $request->input('description');
        $user->city = $request->input('city');
        $user->oppasser = 1;

        try{
            $user->save();
            return \redirect('/account/images/'.$user->id);
        } catch(Exception $e){
            return redirect('/account');
        }
    }

    public function uploadImages($id, Request $request, ProfileImage $profileImage) {
        $i = 0;
        if($request->hasfile('images')){
            foreach ($request->file('images') as $file) {
                $file = $request->file('images');
                $name = '/img/profiles/'.\uniqid().$file[$i]->getClientOriginalName();
                $file[$i]->move('img/profiles', $name);
    
                $i++;

                $profileImage->image = $name;
                $profileImage->userId = $id;

                try{
                    DB::table('profile_images')->insert([
                        'image' => $name,
                        'userId' => $id
                    ]);
                } catch(Exception $e){
                    return redirect('/account/images/'.$id);
                }
            }
            return \redirect('/account/images/saved/'.$id);
        }
        return redirect('/account/images/saved/'.$id);
    }
}
