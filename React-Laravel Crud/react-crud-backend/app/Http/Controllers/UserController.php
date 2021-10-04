<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function register(Request $req){
        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->save();

        return $user;
    }

    function login(Request $req)
    {
                $user=User::where('email', $req->email)->first();
                if(!$user || !Hash::check($req->password, $user->password))
                {
                    return["error" => "Email or password is incorrect"];
                }
                return $user;
 
    }

    function changePassword(Request $req)
    {
       
        $user=User::where('email', $req->email)->first();
        if(!$user)
        {
            return["error" => "Email or password is incorrect"];
        }
        $pass =  Hash::make($req->input('newPassword'));
        // print_r($user->password);die;
            // print_r($user);die;
            $data = $req->input();
            // print_r($data);die;
            $user->password = $pass;
            $result = $user->save();
            // dd($result, $pass);

            // if(!is_null($result))
            // {
            //     return response()->json(['message' => 'Password Changed successfully']);
            // } else{
            //     return response()->json(['message' => 'Unable to changePassword']);
            // }
        
        return $user;
    }

    function users(Request $req){
        $users=User::query()->orderByDesc('name')->paginate(5);
        return response($users,200);
    }
}
