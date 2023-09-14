<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;
    public function companyname() {
        //companiesテーブルからデータを取得する
        $companies = DB::table('companies');
        // if(!empty($search)){
        //     $search->where('product_name', 'LIKE', '%$search%')
        //     ->get();
        // }


        return $companies;
    }
}
