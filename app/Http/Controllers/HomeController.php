<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Seller;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    # $type    type of the login
    public function index()
    {
        $user = User::where("email" ,"=",Session::get("email"))->first();
        $seller = Seller::where("email" ,"=",Session::get("email"))->first();
        $admin = Admin::where("email" ,"=",Session::get("email"))->first();
        if (!($user === null)) {
            return HomeController::show('user');
            
        }elseif (!($seller === null)) {          
            return HomeController::show('seller');
            
        }elseif (!($admin === null)) {
            return HomeController::show('admin');
            
        }else {
            return HomeController::show('none');
        }        
    }

    public static function show($type)
    {
        $data = array();
        $allproduct = array();
        $productid = array(); # the id of products
        $cartUserid = array(); # the cart of this user
        $cartUser = array(); # the cart of this user    
        $category = Category::all();
        $products = Product::all();
        $categoryProduct = CategoryProduct::all();

        # check if the login user or seller
        if (Session::has('loginId')) 
        {
            if ($type === 'user') {   
                $data = User::Where('id' , '=' , Session::get('loginId'))->first();
                $cartUserid = Cart::where('user_id','=', Session::get('loginId'))->first(); 
                if ($cartUserid) {
                    $cartUser = CartProduct::where('cart_id','=',$cartUserid->id)->get();  
                    for ($i=0; $i < count($cartUser) ; $i++) { 
                        $productid[] = ($cartUser[$i]->product_id);
                    }   
                    for ($i=0; $i < count($productid); $i++) { 
                        $allproduct[]  = ($products->where('id','=',$productid[$i])->first());
                    }  
                    return view('index',compact('data','category','categoryProduct','allproduct'));
                    
                } else {
                    return view('index',compact('data','category','categoryProduct'));
                }      
            }elseif ($type === 'seller') {
                $data = Seller::Where('id' , '=' , Session::get('loginId'))->first();
                return view('index',compact('data','category','categoryProduct'));
            }elseif ($type === 'admin') {
                $data = Admin::Where('id' , '=' , Session::get('loginId'))->first();
                return view('index',compact('data','category','categoryProduct'));
            }
        }
        $data = (object) array('type' => 'none');
        return view('index',compact('data','category','categoryProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function livewire()
    {
        return "livewire function";
        return view('livewire.products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeRequest  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect()->route('index');
        }
        return redirect()->route('index');
    }


    public function home_02()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::Where('id' , '=' , Session::get('loginId'))->first();
        }
        
        return view('home-02',compact('data'));
    }

    public function home_03()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::Where('id' , '=' , Session::get('loginId'))->first();
        }
        
        return view('home-03',compact('data'));
    }

}
