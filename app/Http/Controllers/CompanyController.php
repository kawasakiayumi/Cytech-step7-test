<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function companyname(){
        $model = new Company();

        $companies = $model->companyname();

        return view('product.list');
    }
}
 