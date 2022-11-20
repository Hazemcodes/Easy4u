<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("auth.admin-sign");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Admin::create([
            'country_id' => '1',
            'name' => 'Admin 1',
            'email' => 'title_1@gmail.com',
            'password' => Hash::make('title_1'),
            'gender' => 'male',
            'phoneNumber' => '0118738731',
            'type' => "admin",
        ]);
        return "<h1> Done! Created A new Admin </h1>";
    }

    public function admin_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:15',       
        ]);

        $admin = Admin::Where('email' , '=' , $request->email)->first();
        if ($admin) {
            if (Hash::check($request->password , $admin->password)) {
                $request->session()->put('loginId', $admin->id);
                $request->session()->put('email', $admin->email);
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
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
