<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;


class ProductController extends Controller
{
    //
    public function index(){
        $query = Product::select('products.*')->where('user_id','=',\Auth::id());
        $products = $query->get();
        
        return view("index",compact("products"));
    }

public function showCreate(){
    return view("create");
}

public function exeCreate(Request $request){
    $products = $request->all();
    // dd($products);
    DB::transaction(function() use($products){
        Product::create([
            'product_name' => $products['product_name'],
            'stock'=>$products['stock'],
            'price'=>$products['price'],
            'company_id'=>$products['company_id'],
            'user_id'=>\Auth::id()

        ]);
    });

        return redirect('index');
}


}
