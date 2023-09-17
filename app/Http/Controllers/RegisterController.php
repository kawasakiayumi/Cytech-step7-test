<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register(Request $request){

        //$companies = $company_model->get();
        $name = $request->get('name');
        $company_name = $request->get('compay_name');

        return view('products.p_register',[
            'name' => $name,
            'company_name' => $company_name
        ]);
    }
}
