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

public function show($id){
    $product = Product::find($id);
    return view("show",compact("product"));
}

public function edit($id){
    $product = Product::find($id);
    return view("edit",compact("product"));
}

public function update(Request $request){
    $inputs = $request->all();
    // dd($products);
    $products = Product::find($inputs['id']);
    DB::transaction(function() use($products,$inputs){
        $products->fill([
            'product_name' => $inputs['product_name'],
            'stock'=>$inputs['stock'],
            'price'=>$inputs['price'],
            'company_id'=>$inputs['company_id'],
            'user_id'=>\Auth::id()
        ]);
        $products->save();
        DB::commit();
    });
    return redirect('index');

}
}
