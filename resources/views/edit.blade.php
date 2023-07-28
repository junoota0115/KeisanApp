@extends('layouts.app')
@section('title','投稿')
@section('content')
<h1>編集</h1>

<form action="{{route('update')}}" method ="post">
    @csrf
    <input type="hidden" id="id" name="id" value="{{$product->id}}">
    <div class="form-group">
        <label for="product_name">商品名</label>
        <input type="text" name="product_name" id="product_name" value="{{$product->product_name}}" > 
    </div>
    <div class="form-group">
        <label for="stock">在庫</label>
        <input type="integer" name="stock" id="stock"  value="{{$product->stock}}"> 
    </div>
    <div class="form-group">
        <label for="price">金額</label>
        <input type="integer" name="price" id="price"  value="{{$product->price}}"> 
    </div>
    <div class="form-group">
        <label for="company_id">会社名</label>
        <input type="integer" name="company_id" id="company_id"  value="{{$product->company_id}}"> 
    </div>

    <button type="submit" class="btn btn-primary">送信</button>
</form>

@endsection