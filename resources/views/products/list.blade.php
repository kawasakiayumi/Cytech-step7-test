@extends('layouts.app')

@section('title', '商品情報一覧画面')

@section('content')


<!-- 商品一覧 -->
<div class ="card text-center">
    <h2 class="m-3">商品一覧画面</h2>
</div>
        <form action="ProductController.php" method="get"></form>
            @csrf

<!-- 検索欄 -->
<div class="container text-center">

    <table>
        <div class="form-row align-items-center justify-content-around">
        <div class="form-group">
        <tr>
            <td>
                <form action="ProductController.php" method="get">
                    @csrf
                <input type="search" name="search" placeholder="検索キーワード" class="form-control  col-12">
                </form>
            </td>
        </div>
    

<div class="form-group col-6">
            <td>
                <select name="companyname" class="form-control">
                <option value='' disabled selected style='display:none;'>メーカー名</option>
                @foreach($companies as $company)
                <option value="{{ $company-> Id }}">{{ $company-> company_name }}</option>
                @endforeach
                </select>
            </td>
</div>
            <td>
                <form action="ProductController.php" method="get">
                    @csrf
                <button type="submit" name="submit" class="btn btn-primary">検索</button>
                </form>
            </td>
</tr> 
</div>
</div>


<div class="table-striped">
     <table style="width: 1000px; max-width: 0 auto;" class="table table-bordered">
        <thead>
            <tr class="table-info fs-5">
                <td scope="col">ID</td>
                <td scope="col">商品画像</td>
                <td scope="col">商品名</td>
                <td scope="col">価格</td>
                <td scope="col">在庫数</td>
                <td scope="col">メーカー名</td>
                 
            </tr>
        </thead>

        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->Id }}</td>
                <td>{{ $product->img_path}}</td>
                <td>{{ $product->product_name}}</td>
                <td>{{ $product->price}}</td>
                <td>{{ $product->stock}}</td>
                <td>{{ $product->company_name}}</td>

                <div class="mx-auto">
                <td>
                    <button type="button" onclick="location.href='{{ route('detail', ['id' => $product->Id] ) }}'" class="btn btn-outline-info">詳細</button>
                </td>
                <td>
                    <input type="submit"onclick='return confirm("内容を削除してもよろしいですか？")' value="削除" class="btn btn-outline-danger">
                </td>
                </div>
                    
</tr>         
        @endforeach
        
        </tbody>
    </table>

    <td>
    <div class="d-grid gap-2 col-2 mx-auto p-2">
        <button type="button" onclick="location.href='{{route ('p_register')}}'" class="btn btn-primary">新規登録</botton>
   
</div>
 </td>  
</div>
@endsection