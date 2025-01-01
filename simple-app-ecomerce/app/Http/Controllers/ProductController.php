<?php

namespace App\Http\Controllers;


use App\Models\Livre_product;
use App\Models\Product;
use App\WeatherService;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    //

    public function index(){
        $AllProducts=Product::all();
        return view('product.index',['products'=>$AllProducts]);
    }
    public function books(){
        $AllProducts=Livre_product::all();
        return view('product.books',['allBooks'=>$AllProducts]);
    }
   
    
}
