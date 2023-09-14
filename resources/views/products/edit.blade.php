@extends('layouts.app')

@section('title', '商品情報編集画面')

@section('content')

  <div class ="card text-center">
    <h2 class="m-3">商品情報編集画面</h2>
  </div>
    <form action="{{route('edit', ['id' => $update->Id] )}}" method="post">
    @csrf

<!-- 編集フォーム -->
<form>
    <div class="form">
    <div class="container">

<div class="form-group p-2">
    <label for="id">ID：</label>
        <div class="form-control">{{ $update->Id }}
        </div>
</div>

<div class="form-group p-2">
    <label for="product_name">商品名：</label>
        <input type="text" class="form-control" name="product_name" value="{{ $update->product_name }}"></div>

<div class="form-group p-2">
    <label for="conpanyname">メーカー名：</label>
        <select name="companyname" class="form-control">
            <option value='' disabled selected style='display:none;'>メーカー名を選択</option>
            @foreach($companies as $company)
            <option value="{{ $company-> Id }}">{{ $company-> company_name }}</option>
            @endforeach
        </select>
</div>

<div class="form-group p-2">
    <label for="price">価格：</label>
        <input type="text" class="form-control" name="price" value="{{ $update->price }}">
</div>

<div class="form-group p-2">
    <label for="stock">在庫数：</label>
        <input type="text" class="form-control" name="stock" value="{{ $update->stock }}">
</div>

<div class="form-group p-2">
    <label for="comment">コメント：</label>
        <input type="textarea" class="form-control" name="comment" value="{{ $update->comment }}">
</div>

<div class="form-group p-2">
    <label for="img">商品画像：</label>
    <form method="post" action="/upload" enctype="multipart/form-data">
        @csrf
        <input type="file" class="form-control-file" name="img" value="{{ $update->img_path }}">
</div>

    <div class="d-grid gap-2 col-2 mx-auto p-2">
    <button type="button" class="btn btn-primary" name="update">更新</button>

    <button type="button" class="btn btn-outline-primary" name="edit" onclick="history.back()">戻る</button>
    </div>
    </div>
    </div>
</form>



@endsection