<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Country;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("auth.seller-sign");
    }

    public function register()
    {
        $country = Country::all();
        return view("auth.seller-registration",compact('country'));
    }

    public function seller_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:15',       
        ]);

        $seller = Seller::Where('email' , '=' , $request->email)->first();
        if ($seller) {
            if (Hash::check($request->password , $seller->password)) {
                $request->session()->put('loginId', $seller->id);
                $request->session()->put('email', $seller->email);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Seller::create([
            'country_id' => '1',
            'name' => 'Seller 1',
            'email' => 'title_1@gmail.com',
            'password' => Hash::make('title_1'),
            'gender' => 'male',
            'phoneNumber' => '0118738731',
        ]);

        return "<h1> Done </h1>";
    }

    public function checkPassword($id)
    {
        $seller = Seller::where('id', $id)->first();
        $password = $seller->password;

        if (Hash::check('title_1', $password)) {
            return "<h1> The passwords match </h1>";
        }

        return "<h1> The passwords not match </h1>";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSellerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',       
            'name' => 'required',
            'email' => 'required|email|unique:sellers',
            'password' => 'required|min:5|max:15',       
            'gender' => 'required',       
            'phoneNumber' => 'required|numeric|unique:sellers|min:11',
        ]);
        $country = Country::all();
        $countryName = $request->country;
        $country_id = $country->where('name','=',$countryName)->first()->id;

        $res = Seller::create([
            'country_id' => $country_id,
            'name' => $request-> name ,
            'email' => $request-> email ,
            'password' => Hash::make($request-> password),
            'gender' => $request-> gender,
            'phoneNumber' => $request-> phoneNumber,
            'type' => "seller",
            ]);
        if ($res) {
            return back()->with('success','You have registered successfuly & Welcome to Our Team');
        } 
        else {
            return back()->with('fail','Something Wrong :(');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellerRequest  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
