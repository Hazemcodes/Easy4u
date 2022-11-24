<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Country;
use App\Models\Category;
use App\Models\User;
use App\Models\Seller;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Size;
use App\Models\CategoryProduct;
use App\Models\CartProduct;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryProductController;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        $category = array();
        $category = Category::all();
        if (Session::has('loginId')) {
            $data = Seller::Where('id' , '=' , Session::get('loginId'))->first();
            $country = Country::where('id','=',$data->country_id)->first()->name;
            return view('addNewProduct',compact('data','country',"category"));
        }else {
            return redirect()->route('index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = Seller::Where('id' , '=' , Session::get('loginId'))->first();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'category' => 'required',
            'price' => 'required|numeric|min:1',    
            'materials' => 'required',
        ]);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'public/assets/images';
            $image->move($destinationPath, $image_name);            

            $res = Product::create([
                'country_id' => $data->country_id,
                'seller_id' => $data->id,
                'name' => $request-> name ,
                'description' => $request-> description ,
                'photo' => $destinationPath.'/'.$image_name ,
                'price' => $request-> price,
                'weight' => $request-> weight,
                'dimensions' => $request-> dimensions,
                'materials' => $request-> materials,
                ]);
                if (Product::exists()) {
                    $productId = Product::latest("id")->first()->id ;// getting the product id after creating it to save the color and size
                }
                else {
                    $productId = 1;
                }
                if ($request->color) {
                    for ($i=0; $i < count($request->color); $i++) {
                            Color::create([
                                'product_id' => $productId,
                                'color' => $request-> color[$i],
                                ]);
                    }
                }
                if ($request->size) {
                    for ($i=0; $i < count($request->size); $i++) { 
                            Size::create([
                                'product_id' => $productId,
                                'size' => $request-> size[$i],
                                ]);
                    }
                }
            if ($res) {
                return ProductController::saveCat($request->category);                
            }else {
                ProductController::index();
            }     
        }else {
            return redirect()->route('index');
        }
    }

    # connect between the product and category
    public function saveCat($title)
    {
        $category = Category::all();
        for ($i = 0; $i < count($category); $i++){
            if ($category[$i]->title === $title) {
                $productID = Product::latest("id")->first()->id;
                $categoryID = $category[$i]->id;
                $CategoryProductController = new CategoryProductController;
                return $CategoryProductController->store($categoryID,$productID);
            }
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $user = User::where("email" ,"=",Session::get("email"))->first();
        $seller = Seller::where("email" ,"=",Session::get("email"))->first();
        $admin = Admin::where("email" ,"=",Session::get("email"))->first();

        $categoryproID = CategoryProduct::where('product_id','=',$product->id)->first()->category_id;
        $categoryName = Category::where('id','=',$categoryproID)->first()->title;
        $country = Country::where('id','=',$product->country_id)->first()->name;
        $category = Category::all();

        if (!($user === null)) {
            $data = (object) array('type' => 'user');
            $name = $user->name;
            
        }elseif (!($seller === null)) {          
            $data = (object) array('type' => 'seller');
            $name = $seller->name;
            
        }elseif (!($admin === null)) {
            $data = (object) array('type' => 'admin');
            $name = $admin->name;
            
        }else {
            $data = (object) array('type' => 'none');
            $name = 'none';
        }    
        return view('product.edit-product',compact('product','data','categoryName','category','country','name'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'price' => 'required|numeric|min:1',    
            'materials' => 'required',
        ]);
        $seller = Seller::where("email" ,"=",Session::get("email"))->first();
        $product = Product::find($id);
        if (!($seller === null)) {          
            $sellerId = $seller->id;
        }else {
            return HomeController::show('none');
        }    
        if ($request->hasFile('photo')) {
            $photo = "assets/images/".$request-> photo;
            if (File::exists($photo)) {
                File::delete($photo);
            }
            $image = $request->file('photo');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'assets/images';
            $image->move($destinationPath, $image_name); 
            $product->photo = $destinationPath.'/'.$image_name;
        }
            $product->seller_id = $sellerId;
            $product->country_id = $seller->country_id;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->weight = $request->weight;
            $product->dimensions = $request->dimensions;
            $product->materials = $request->materials;
            $product->update();
            if ($request->color) {
                Color::where('product_id','=',$id)->delete();
                for ($i=0; $i < count($request->color); $i++) { 
                        Color::create([
                            'product_id' => $id,
                            'color' => $request-> color[$i],
                            ]);
                }
            }
            if ($request->size) {
                Size::where('product_id','=',$id)->delete();
                for ($i=0; $i < count($request->size); $i++) { 
                        Size::create([
                            'product_id' => $id,
                            'size' => $request-> size[$i],
                            ]);
                }
            }
        return redirect('/')->with('status','product updated Successfully');
    }

    public function delete($id)
    {
        Product::where('id','=',$id)->delete();
        return redirect()->route('/');
    }

   /*  public function productList()
    {
        $products = Product::all();

        return view('products', compact('products'));
    } */
}
