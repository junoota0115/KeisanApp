<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Stock;
use Carbon\Carbon;

class StockController extends Controller
{
    //
     //========== update api ==========
     public function update($id)
     {
         
         //productのidでproductsを検索し商品があるかどうか確認
         $select_product = Product::select('products.*')
         ->where('id','=',$id)
         ->first();
         // var_dump($select_product);
         // ->get();//配列で入ってくる
 
         DB::beginTransaction();
         //stockが0か確認
         try{
         if($select_product->stock <= 0) {
             echo('在庫がありません！');
         //1つでもあれば、送られてきたproductのidをsalesテーブルに追加
         }else{
            Stock::insert([
             'product_id' => $id,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
         ]);
         //指定した商品のstockを-1してstockを更新する
         $product_stock = $select_product->stock -1;
         Product::where('id','=',$id)->update(['stock' => $product_stock]);
         echo('成功しました！');
         }
         DB::commit();
         }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
         }
     }
     //========== update api ==========
 
     //===========index==========
         public function index(){
             $stock = Stock::all();
             return response()->json($stock);
         }

}
