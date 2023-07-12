<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function registerProduct(){
        return view('/productRegister');
    }
    function registerProductPost(Request $request){
        $request->validate([
            'product_name'=>'required',
            'price'=>'required'
        ]);
        $data['product_name']=$request->product_name;
        $data['price']=$request->price;
        $product=Product::create($data);
        if(!$product){
            return redirect(route('products.index'))->with("error","registration failed");
        }
        return redirect(route('products.index'))->with("success","Registration successfull");
}
public function index(){
    $products=Product::all();
    return view('products.index',compact('products'));
}
}