<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Register extends Model
{
    use HasFactory;
    //
    public function register(){
        $registers = DB::table('products')->get();

        return $registers;
    }

    public function registers(){
        //商品新規登録
        DB::table('products')->insert(([
            'product_name',
            'compny_name',
            'price',
            'stock',
            'comment',
            'img'
        ]));
    }
}
