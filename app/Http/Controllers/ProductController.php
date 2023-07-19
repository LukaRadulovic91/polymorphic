<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        public function edit(Product $product){
        return view('products.edit', compact('product'));
        }
        function listProducts() {

            $products = DB::table('products')->get();
        
            return view('products/index', ['products' => $products]);
        }

        public function update(Request $request,Product $product){
            $data=$request->only(['product_name','price']);
            $product->fill($data);
            $product->save();
            return redirect("products/index")->with('success','product updated successfully');
        }
        public function delete($id){
            DB::delete('delete 
            from products
            where id=?',[$id]);
             return redirect("products/index")->with('success','product deleted successfully');
        }
        public function show($id){
            $products=Product::find($id);
            return view('products.show',compact('products'));
        }

        public function store(Request $request){
            $validator=Validator::make($request->all(),[
                'name'=>'required',
                'price'=>'required'
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'=>400,
                    'errors'=>$validator->messages()
                ]);
            }
            else{
                $product=new product;
                $product->product_name=$request->input('name');
                $product->price=$request->input('price');
                $product->save();
                return response()->json([
                    'status'=>230,
                    'message'=>'added successfully'
                ]);
            }
            
        }
}