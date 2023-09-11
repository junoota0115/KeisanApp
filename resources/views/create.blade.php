@extends('layouts.app')
@section('title','投稿')
@section('content')
<h1>商品を登録</h1>

<form action="{{route('exeCreate')}}" method ="post">
    @csrf

    <div class="form-group">
        <label for="product_name">商品名</label>
        <input type="text" name="product_name" id="product_name" > 
    </div>
    <div class="form-group">
        <label for="stock">在庫</label>
        <input type="integer" name="stock" id="stock" > 
    </div>
    <div class="form-group">
        <label for="price">金額</label>
        <input type="integer" name="price" id="price" > 
    </div>
    <div class="form-group">
        <label for="company_id">会社名</label>
        @foreach ($companies as $company)
        <input type="radio" name="company_id" id="{{$company['company_name']}}" value="{{$company['id']}}" > 
        <label class="form-check-label" for="{{$company['company_name']}}">{{$company['company_name']}}</label>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">送信</button>
</form>

@endsection