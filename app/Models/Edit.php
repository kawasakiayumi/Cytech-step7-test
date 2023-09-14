<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Edit extends Model
{
    use HasFactory;

//編集画面の表示
public function edit($edit, $id){
    $edit = DB::table('products')
    ->get($id);

    $product = new Product;
    // $update = product::find($id);
    return $edit;
}
//編集(更新処理)
public function update($request, $update, $id)
{
    // $update = new update;
    $update = Product::find($id);

    $result = $update->fill([
        'product_name' => $request->input('product_name'),
        'company_name' => $request->input('company_name'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),
        'comment' => $request->input('comment'),
        'img' => $request->input('img'),
    ])
    ->save();

    return $update;
}
}
