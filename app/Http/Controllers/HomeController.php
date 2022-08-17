<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \Crypt;
use Auth;
use \Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.panel');
    }

    // adminpanel.index


    public function change_password(Request $request){

        $data = DB::table('users')->get();

        // $pass = [];
        // foreach($data as $key =>$value){
        //     $pass[] = $value->password;
        // }
        
        // $origial_pass = Crypt::decrypt($pass[0]);

        // dd($origial_pass);

        



        
        // Crypt::decrypt()
        return view('password.index');





    }


    public function update_password(Request $request){

        // dd(Auth::user()->password);
        // $current_password = $request->current_password;
        // dd($current_password);
        // // $ep =Hash::check("Singh@123");

        // dd($ep);


        
        
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        // dd("xhw");

        if(strcmp($request->current_password, $request->new_password) == 0){
            //Current password and new password are same
            
            return redirect()->back()->with("message","New Password cannot be same as your current password. Please choose a different password.");
        }


        // dd("ds");
   

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        // dd($user->password);
        $user->save();  

        return redirect()->back()->with("success","Password changed successfully !");




    }

}
