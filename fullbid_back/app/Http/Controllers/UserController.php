<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    function register(Request $req){
      error_log($req->name);
       try{
        $user=new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $neww=User::where('email',$req->email)->first();
        if ($neww){
            return ['error' => 'Email already exist! Please Login '];
        }

        $user->password =Hash::make( $req->password);
        error_log($user);

        $user->save();
        error_log('on save',$user->save());

      return response()->json(['successss'=>$req->name]);
        // return response()->$user->name;

       }
       catch(Exception $e){
        error_log('error',$e->getMessage());
       }
        return 'false';
    
    }
    function login(Request $request){
        $user=User::where('email',$request->email)->first();
       if (!$user || ! Hash::check($request->password, $user->password)){
           return ['error' => 'Email or password is incorrect'];
       }else {
        return ['sucess' => $user];
    }

   }
    function userList(){
        return User::all();
    }
    function items(Request $request){
        try {
            $item=new Item();
            $item->itemTitle=$request->itemTitle;
            $item->itemDisc=$request->itemDisc;
            $item->itemDuration=$request->itemDuration;
            $item->itemImage=$request->itemImage;
            $item->itemStartPrice=$request->itemStartPrice;
            $item->save();
            error_log($request);
            return $request;
        } catch (Exception $e) {
            error_log($e);
        }
    }

}
