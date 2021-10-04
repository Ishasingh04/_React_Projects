<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    function uploadImage(Request $request){
       
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $finalName = date('His'). $filename;
            $request->file('image')->storeAs('images/', $finalName,'public');
            return response()->json(["message" => "Successfully upload an image"]);
        }else{
            return response()->json(["message" => "You must select the image first"]);
        }

    }

    public function uploadProfile(Request $request){
        $profile = new Profile;
        $profile->name=$request->input('name');
        $profile->age=$request->input('age');
        $profile->gender=$request->input('gender');
        $profile->hobby=$request->input('hobby');
        $profile->tenth=$request->input('tenth');
        $profile->twelth=$request->input('twelth');
        $profile->graduation=$request->input('graduation');
        $profile->postgraduation=$request->input('postgraduation');
        //$profle->file_path=$request->file('file_path')->store('images/','public');
        $profile->save();
        return $profile;

    }

    public function display()
     {
        return Profile::all();
    }

    public function upload(Request $request){
        $profile = new Profile;
        $profile->name=$request->input('name');
        $profile->age=$request->input('age');
        $profile->gender=$request->input('gender');
        $profile->hobby=$request->input('hobby');
        $profile->tenth=$request->input('tenth');
        $profile->twelth=$request->input('twelth');
        $profile->graduation=$request->input('graduation');
        $profile->postgraduation=$request->input('postgraduation');
        $profile->file_path = $request->file('file')->store('documents');
        $profile->save();
        return $profile;
       // return $request->file('file')->store('public/documents');
    }
}  
