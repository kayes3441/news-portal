<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class UserController extends Controller
{
    public function registration (Request $request){
        $validator = Validator::make($request->all(),[
            'f_name'       =>'required',
            'l_name'   => 'required',
            'email'   => 'required|email|unique:users',
            'password'   => 'required | min:8',
            'confirm_password'   => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        DB::table('users')->insert([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'password' =>bcrypt($request->passoword),
            'created_at' =>now(),
            'updated_at' =>now(),
        ]);
        return redirect()->back()->with('message.success','Registration Successfully complete');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
           'email'      => 'required',
           'password'   => 'required'
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        // return $request->all();

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        //return response()->json(request()->all());
        if (Auth::guard('users')->attempt($credentials))
        {
            return redirect()->back()->with('message.success','Successfully Login');
        }
        else{
            return redirect()->back()->with('message.wranning','Credential Not Match');
        }

    }
    public function logout(){
        Auth::guard('users')->logout();
        return redirect()->back()->with('message.success','Log Out Successfully');
    }
}
