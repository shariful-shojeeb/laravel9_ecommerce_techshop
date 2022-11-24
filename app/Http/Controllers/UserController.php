<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
      return view('frontend.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginChk(Request $request)
    {
        $validated = $request->validate([
            'user_email' => 'required',
            'password' => 'required',
        ]);
            //Receiving Form Data
            $user_email=$request->user_email;
            $user_password=$request->password;

            //Checking Data for Authentication
            $user_data=DB::table('users')
            ->where('user_email',$user_email)
            ->first();

             $passChk=Hash::check($request->password,$user_data->password);
            if($passChk){

                //Adding Admin Data to Session
            session()->put('user_name', $user_data->user_name);
            session()->put('user_id', $user_data->id);
            session()->put('user_role', $user_data->user_role);
            //return redirect()->back();
            return redirect()->route('homepage');
            }
            else{
                session()->put('error_message', 'Invalid Login Details');
                return redirect()->route('user.login');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signUpView()
    {
       return view('frontend.signup');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userStore(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|max:255',
            'user_email' => 'required|unique:users|max:255',
            'user_phone' => 'required|unique:users|regex:/(01)[0-9]{9}/|min:11|max:14',
            'password' => 'required|confirmed|min:6',
        ]);
       DB::table('users')->insert([
        'user_name'=>$request->user_name,
        'user_email'=>$request->user_email,
        'user_phone'=>$request->user_phone,
        'password'=>Hash::make($request->password),
       ]);
       session()->put('success_message', 'Successfully Signed up');
       return redirect()->route('user.signup');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userLogout()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
