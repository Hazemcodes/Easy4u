<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_user(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:15',       
        ]);

        $user = User::Where('email' , '=' , $request->email)->first();
        if ($user) {
            if (Hash::check($request->password , $user->password)) {
                $request->session()->put('loginId', $user->id);
                $request->session()->put('email', $user->email);
                return redirect()->route('index');
            }
            else
            {
                return back()->with('fail','The Password is incorrect');
            }
        } else {
            return back()->with('fail','This email is not registered');
        }
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',       
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:15',       
            'gender' => 'required',       
            'phoneNumber' => 'required|numeric|unique:users|min:11',       
        ]);
        $user_id = 1;
        $country = Country::all();
        $countryName = $request->country;
        $country_id = $country->where('name','=',$countryName)->first()->id;
        if (User::latest()->first()) {
            $user_id = User::latest()->first()->id +1;
        }else{
            $user_id = 1;
        }
        $res = User::create([
            'country_id' => $country_id,
            'name' => $request-> name ,
            'email' => $request-> email ,
            'password' => Hash::make($request-> password),
            'gender' => $request-> gender,
            'phoneNumber' => $request-> phoneNumber,
            'type' => "user",
            ]);
        $cart = Cart::create([
            'user_id' => $user_id,
            'salary' => 0.0,
        ]);
        if ($res && $cart) {
            return back()->with('success','You have registered successfuly');
        } 
        else {
            return back()->with('fail','Something Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("auth.sign");
    }

    public function register()
    {
        $country = Country::all();
        return view("auth.registration",compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
