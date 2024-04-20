<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   
    public function create(Request $request){

        $store['name'] = $request->name;
        $store['email'] = $request->email;
        $store['password'] = '123456';

        User::create($store);
        return response()->json('User is created Successfully');
    }

    public function userlist(){

        $user = User::orderby('id','DESC')->get();
        return response()->json($user);
        
    }

    public function useredit(Request $request, $id){

        $user= user::find($id);
        return response()->json($user);
    }

    public function updateuser(Request $request,$id){
        // return "ewteter";
        User::where('id',$id)->update(['name'=>$request->name,'email'=>$request->email]);
        return response()->json('data update');
    }
}
