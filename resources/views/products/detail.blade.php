@extends('layouts.app')

@section('title', '商品情報詳細画面')

@section('content')

<div class ="card text-center">
    <h2 class="m-3">商品情報詳細画面</h2>
</div>
    <form action="{{route('list')}}" method="post">
    @csrf

    <div class="container">
    <table class="table table-bordered">
    <tbody>
        <tr>
            <td class="table-info fs-5">
                <div class="text-center">ID</div>
            </td>
            <td><div class="text-center">{{ $detail->Id }}</div>
        </td>
        </tr>
        <tr>
            <td class="table-info fs-5">
            <div class="text-center">商品画像</div>
        </td>
            <td><div class="text-center">{{ $detail->img_path }}</div>
        </td>
        </tr>
        <tr>
            <td class="table-info fs-5">
            <div class="text-center">商品名</div>
        </td>
            <td><div class="text-center">{{ $detail->product_name }}</div>
        </td>
        </tr>
        <tr>
            <td class="table-info fs-5">
            <div class="text-center">メーカー</div>
        </td>
            <td><div class="text-center">{{ $detail->company_id }}</div>
        </td>
        </tr>
        <tr>
            <td class="table-info fs-5">
                <div class="text-center">価格</div>
            </td>
            <td><div class="text-center">¥{{ $detail->price }}</div>
        </td>
        </tr>
        <tr>
            <td class="table-info fs-5">
            <div class="text-center">在庫数</div>
        </td>
            <td><div class="text-center">{{ $detail->stock }}個</div>
        </td>
        </tr>
        <tr>
            <td class="table-info fs-5">
            <div class="text-center">コメント</div>
        </td>
            <td><div class="text-center">{{ $detail->comment }}</div>
        </td>
        </tr>
    </tbody>

    <div class="d-grid gap-2 col-2 mx-auto p-2">
    <button type="button" onclick="location.href='{{ route('edit', ['id' => $detail->Id] ) }}'" class="btn btn-primary">編集</button>

    <button type="button" class="btn btn-outline-primary" name="modoru" onclick="history.back()">戻る</button>
    </div>

</table>
    </div>
</div>
@endsection