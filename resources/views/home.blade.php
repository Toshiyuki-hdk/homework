@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<h1>一覧画面</h1>
<p><a href="{{ route('product.create') }}">新規登録</a></p>

<!-- @if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif -->

<table border="1">
    <tr>
        <th>id</th>
        <th>商品画像</th>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>メーカー名</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->img_path }}</td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>{{ $product->company_id }}</td>
        <th><a href="{{ route('product.show',$product->id)}}">詳細表示</a></th>
        <th>
            <form action="{{ route('product.destroy', $product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="削除">
            </form>
        </th>
    </tr>
    @endforeach
</table>
@endsection
