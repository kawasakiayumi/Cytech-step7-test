<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\Detail;
use App\Models\Edit;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
//キーワード検索（部分一致検索）
    public function search(Request $request){
    $model = new Product();
    $keyword = $request->input('keyword');
    $products = $model->search($keyword);

    return view('products.list',['products'=>$products]);
}

//商品一覧画面
public function list(){
        //useでProductを宣言しているが、そのまま使えるわけではないのでインスタンス生成しなければいけない
        $model = new Product();
        //インスタンス生成したものをアローにて呼び出す
        $products = $model->list();

        //conpaniesテーブルから全件を取得する処理
        $companies = \DB::table('companies')
        ->get();

        //第二引数に指定することでlist.blade.phpを表示した際に変数を使用することができる
        //$productと$companiesをviewに引き渡す
        return view('products.list', [
            'products' => $products,
            'companies' => $companies,
        ]);
    }

//商品新規登録画面表示
    public function register(Request $request){

        $companies = \DB::table('companies')->get();

        return view('products.register',[
            'companies' => $companies,
        ]);
    }
    
    //商品登録処理
    public function submit(Request $request){

        $model = new Product();
        DB::beginTransaction();
    try {
        $model->submit($request);
        DB::commit();
    } 
    catch (\Exception $e) {
        DB::rollBack();
    }
    return redirect(route('list'));
    }

    public function upload(Request $request){
        //ディレクトリ名
        $dir = 'sample';

        //アップロードされたファイル名を取得
        $file_name = $request->file('img')->getClientOriginalName();

        //取得したファイル名で保存
        $request->file('img')->storeAs('public/' .$dir, $file_name);

        //ファイル情報をDBに保存
        $img = new \App\Models\Image();
        $img->name = $file_name;
        $img->path = 'storge/' . $dir . '/' . $file_name;
        $img->save();

        return redirect('/');
    }

    //商品情報詳細画面
    public function detail($id){
        //modelを使えるようにする
        $model = new Product;

        //modelの中のdetail関数にidを渡して、$detailに詰める
        $detail = $model -> detail($id);
        return view('products.detail',['detail' => $detail]);
        //’detail' => $detail　でviewでdetailを使えるようにしている
        //compact('detail')と行うことは同じなのでどちらでもok
    }

//商品情報編集画面の表示
public function edit($id, Request $request){
    
    $companies = \DB::table('companies')
        ->get();
        //modelを使えるようにする
        $model = new Product;

        //modelの中のdetail関数にidを渡して、$detailに詰める
        $update = $model -> detail($id);
    return view('products.edit', ['companies'=>$companies, 'update'=> $update]);
    
}

//編集画面の処理
public function update(Request $request, $id){
    $edit = Edit::find($id);
    $update = $this->$edit->update($request, $edit);

    return view('products.edit');

}

}
