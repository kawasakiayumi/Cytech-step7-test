<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detail extends Model
{
    public function details(){
        $details = DB::table('products')
        ->join('companies','products.company_id', '=','companies.id')
        ->select('products.*', 'companies.company_name')
        ->where('products.id','$detail->id')
        ->first();

        return $details;
    }

}

