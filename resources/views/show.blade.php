@extends('layouts.app')
@section('title','投稿')
@section('content')
<h1>詳細 </h1>

<a href="{{('/create')}}" class="btn btn-secondary">作成</a>

<div class="main-group">
    <table >
        <tr>
            <th>名前</th>
            <th>値段</th>
            <th>在庫</th>
        </tr>
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td><a href="{{ url('/edit', $product->id) }}">編集ページ</a></td>
        </tr>
    </table>
</div>

@endsection