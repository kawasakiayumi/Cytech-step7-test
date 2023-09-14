@extends('layouts.app')

@section('title', '書品情報登録画面')

@section('content')
<form action="{{ route('submit') }}" method="post">
  @csrf  
<div class ="card text-center">
    <H2 class="m-3">商品新規登録画面</H2>
</div>

<form>
<div class="form">
    <div class="container">

    <form class="form-horizontal" role="form">
    <div class="form-group p-2">
    <label for="name">商品名：</label><span class="text-danger">*</span>
    <input type="text" class="form-control" name="product_name">
    </div>

   <div class="form-group p-2">
     <label for="productname">メーカー名：</label><span class="text-danger">*</span>
     <select class="form-control" name="company_id">
     <option value='' disabled selected style='display:none;'>メーカー名を選択</option>
        @foreach($companies as $company)
        <option value="{{ $company -> Id }}">{{ $company -> company_name }}</option>
        @endforeach
     </select>
   </div>

   <div class="form-group p-2">
    <label for="price">価格：</label><span class="text-danger">*</span>
    <input type="text" class="form-control" name="price">
   </div>

   <div class="form-group p-2">
    <label for="stock">在庫数：</label><span class="text-danger">*</span>
    <input type="text" class="form-control" name="stock">
   </div>

   <div class="form-group p-2">
    <label for="comment">コメント：</label>
    <textarea class="form-control" name="comment"></textarea>
   </div>

   <div class="form-group p-2">
    <label for="img">商品画像：</label>
    <form method="post" action="/upload" enctype="multipart/form-data">
        @csrf
    <input type="file" name="img" class="form-control-file">
    </form>
   </div>
    </form>

   </div>
</div>


<div class="d-grid gap-2 col-2 mx-auto p-2">
   <button type="submit" class="btn btn-primary">新規登録</button>

   <button type="button" onclick="history.back()" class="btn btn-outline-primary" name="modoru">戻る</button>
</div>
</div>
</form>


@endsection