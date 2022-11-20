<?php

namespace App\Http\Livewire;

use App\Http\Controllers\HomeController;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CategoryProduct;
use App\Models\Category;
use App\Models\User;
use App\Models\Admin;
use App\Models\Seller;
use Illuminate\Support\Facades\Session;
use Psy\Readline\Hoa\Console;

class Products extends Component
{
    use WithPagination;

    public $perpage = 4;

    public function loadMore()
    {
        $this->perpage += 4; 
    }

    public function render()
    {
        $products = Product::paginate($this->perpage);
        $categoryProduct = CategoryProduct::all();
        $category = Category::all();
        $data = array();
        if (Session::has('loginId')) {
            $user = User::where("email" ,"=",Session::get("email"))->first();
            $seller = Seller::where("email" ,"=",Session::get("email"))->first();
            $admin = Admin::where("email" ,"=",Session::get("email"))->first();

            if ($user == !null) {
                $data = (object) array('type' => 'user');
            }elseif ($seller == !null) {          
                $data = (object) array('type' => 'seller');
                $products = Product::Where('seller_id','=',$seller->id)->paginate($this->perpage);

            }elseif ($admin == !null) {
                $data = (object) array('type' => 'admin');
            }
        }else {
            $data = (object) array('type' => 'none');
        }
            return view('livewire.products',[
            'products' => $products,
            'categoryProduct' => $categoryProduct,
            'category' => $category,
            'data' => $data,
        ]);
    }
}
