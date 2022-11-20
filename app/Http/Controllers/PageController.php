<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Country;
use App\Models\CategoryProduct;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CartProduct;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\Session;


class PageController extends Controller
{
    public function about()
    {
        $allproduct = array();
        $category = Category::all();
        $categoryProduct = CategoryProduct::all(); 
        if (Session::has('loginId')) {
            $data = PageController::typeCheck(Session::get("email"))[0];
            $allproduct = PageController::typeCheck(Session::get("email"))[1]; // all products of this cart
            return view('about',compact('data','categoryProduct','allproduct','category'));
        }
        $data = (object) array('type' => 'none');
        return view('about',compact('data','categoryProduct','allproduct','category'));
    }
    public function contact()
    {
        $allproduct = array();
        $category = Category::all();
        $categoryProduct = CategoryProduct::all(); 
        if (Session::has('loginId')) {
            $data = PageController::typeCheck(Session::get("email"))[0];
            $allproduct = PageController::typeCheck(Session::get("email"))[1]; // all products of this cart
            return view('contact',compact('data','categoryProduct','allproduct','category'));
        }
        $data = (object) array('type' => 'none');
        return view('contact',compact('data','categoryProduct','allproduct','category'));
    }

    public function product()
    {
        $products = product::all();
        $allproduct = array();
        $category = Category::all();
        $categoryProduct = CategoryProduct::all(); 
        if (Session::has('loginId')) {
            $data = PageController::typeCheck(Session::get("email"))[0];
            $allproduct = PageController::typeCheck(Session::get("email"))[1]; // all products of this cart
            if ($data->type === 'seller') {
                $products = Product::Where('seller_id','=',$data->id)->get();
            }
            return view('product',compact('data','products','categoryProduct','allproduct','category'));
        }
        $data = (object) array('type' => 'none');
        return view('product',compact('data','products','categoryProduct','allproduct','category'));        
    }

    public function shoping_cart()
    {   
        return PageController::main('shoping-cart');
    }

    public function main($pageName)
    {
        $data = array();  # the products of this cart
        $product = array();  # the products of this cart
        $productid = array(); # the id of products
        $allproduct = array(); # the id of products
        $country = array();
        $cartUserid = array(); # the cart of this user
        $cartUser = array(); # the cart of this user
        $country = Country::all();   
        $product = product::all();
        $category = Category::all();
        $data = User::Where('id' , '=' , Session::get('loginId'))->first();

        if ($data->type == "user") {
            $type = "user";     
            $cartUserid = Cart::where('user_id','=', Session::get('loginId'))->first();     
            $cartUser = CartProduct::where('cart_id','=',$cartUserid->id)->get();  
            for ($i=0; $i < count($cartUser) ; $i++) { 
                $productid[] = ($cartUser[$i]->product_id);
            }   
    
            for ($i=0; $i < count($productid); $i++) { 
                $allproduct[]  = ($product->where('id','=',$productid[$i])->first());
            }        
    
            return view($pageName,compact('data','category','allproduct','country','type'));
        }

        if ($pageName == 'product-detail') {
            $type = "none";
            return view($pageName,compact('data','category','allproduct','country','type'));
        }

        $home = new HomeController;
        return $home->index();
    }

    public function product_detail($proId)
    {
        $country = Country::all();   
        $category = Category::all(); 
        $categorypro = CategoryProduct::Where('product_id' , '=' , $proId)->first()->category_id; 
        $categorytitle = Category::Where('id' , '=' , $categorypro)->first()->title; 
        $data = PageController::typeCheck(Session::get("email"))[0];
        $allproduct = PageController::typeCheck(Session::get("email"))[1]; # all products of this cart
        $products = product::all();
        if ($data===null) {
            $data = (object) array('type' => 'none');
        }
        $allProducts = product::paginate(6);
        $productSize = array();
        $productColor = array();
        $type = $data->type ;
        $product = Product::Where('id' , '=' , $proId)->first();
        $productId = $product->id;
        $productName = $product->name;
        $productDes = $product->description;
        $productImage = $product->photo;
        $productPrice = $product->price;
        $productWeight = $product->weight;
        $productDim = $product->dimensions;
        $productMaterials = $product->materials;
        $allColors = Color::where('product_id','=',$productId)->get();
        $allSizes = Size::where('product_id','=',$productId)->get();

        for ($i=0; $i < count($allColors) ; $i++) { 
            $productColor []= $allColors[$i]->color;
        }
        for ($i=0; $i < count($allSizes) ; $i++) { 
            $productSize []= $allSizes[$i]->size;
        }
        $productCountry = Country::Where('id' , '=' , $product->country_id)->first()->name;
        return view('product-detail',compact('data','allProducts','category','type','allproduct','productName','products','productId',
        'productDes','productPrice','productImage','productColor','productWeight','productDim','productMaterials','productSize','categorytitle'));
    }

    public function typeCheck($email)
    {
        $data = array();
        $user = User::where("email" ,"=",$email)->first();
        $seller = Seller::where("email" ,"=",$email)->first();
        $admin = Admin::where("email" ,"=",Session::get("email"))->first();
        $products = product::all();
        $allproduct = array();
        if (!($user === null)) {
            $data = User::Where([
                ['id' , '=' , Session::get('loginId')],
                ["email" ,"=",Session::get("email") ],
                ])->first();
            $cartUserid = Cart::where('user_id','=', Session::get('loginId'))->first();     
            $cartUser = CartProduct::where('cart_id','=',$cartUserid->id)->get(); 
            if (!count($cartUser)==0) {
                for ($i=0; $i < count($cartUser) ; $i++) { 
                    $productid[] = ($cartUser[$i]->product_id);
                }   
                for ($i=0; $i < count($productid); $i++) { 
                    $allproduct[]  = ($products->where('id','=',$productid[$i])->first());
                }        
            }

        }elseif (!($seller === null)) {          
            $data = Seller::Where([
                    ['id' , '=' , Session::get('loginId')],
                    ["email" ,"=",Session::get("email") ],
                    ])->first();

        }elseif (!($admin === null)) {
            $data = Admin::Where([
                    ['id' , '=' , Session::get('loginId')],
                    ["email" ,"=",Session::get("email") ],
                    ])->first();

        }else {
            $data = (object) array('type' => 'none');
        }
        return [$data,$allproduct];
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

}
