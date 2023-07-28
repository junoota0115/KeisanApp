@extends('layouts.app')
@section('title','投稿')
@section('content')
<h1>一覧 </h1>

<a href="{{('/create')}}" class="btn btn-secondary">作成</a>

<div class="main-group">
    <table border="1">
        <tr>
            <th>名前</th>
            <th>値段</th>
            <th>在庫</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td><a href="{{ url('/show', $product->id) }}">詳細ページ</a></td>
        </tr>
        @endforeach
    </table>
</div>

@endsection