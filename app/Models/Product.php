<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
//キーワード検索の表示
public function search($keyword){
    $search = DB::table('products')
    ->select('products.product_name')
    ->where('products.product_name', 'LIKE', '%'.'$keyword'.'%')
    ->get();

    return $search;
}

//商品リストの表示
public function list() {
    //productsテーブルからデータを取得する
    //データベース結合
    $products = DB::table('products')
    ->join('companies', 'products.company_id', '=', 'companies.id')
    ->select('products.*', 'companies.company_name')
    ->get();

    return $products;
    }

    public function submit($request){
        DB::table('products')
        ->insert([
            'product_name'=> $request->input('product_name'),
            'company_id'=> $request->input('company_id'),
            'price'=> $request->input('price'),
            'stock'=> $request->input('stock'),
            'comment'=> $request->input('comment'),
            'created_at'=> now(),
            'updated_at'=> now(),
        
        ]);
    }

    public function detail($id){
        $details = DB::table('products')
        ->join('companies','products.company_id', '=','companies.Id')
        ->select('products.*', 'companies.company_name')
        ->where('products.Id',$id)
        ->first();

        return $details;
    }

}
