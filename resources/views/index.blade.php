@extends('layouts.app')
@section('title','投稿')
@section('content')
<h1>一覧 </h1>

<a href="{{('/create')}}" class="btn btn-secondary">作成</a>

<div class="main-group">
    <table >
        <tr>
            <th>名前</th>
            <th>値段</th>
            <th>在庫</th>
        </tr>
        @foreach ($products as $product)
            <form action="{{ route('destroy', ['id' => $product->id]) }}" method="POST">
            @csrf
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td><a href="{{ url('/show', $product->id) }}">詳細ページ</a></td>
            <td><button type="submit" class="btn btn-danger">削除</td>
                </form>
        </tr>
        @endforeach
    </table>
</div>

@endsection