<h1>詳細画面</h1>

<table border="1">
    <tr>
        <th>商品情報ID</th>
        <th>商品画像</th>
        <th>商品名</th>
        <th>メーカー</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>コメント</th>
    </tr>
    <tr>
        <td>{{ $product->id }}</td>
        <td><img src="{{ Storage::url($product->img_path) }}"></td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->company->company_name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>{{ $product->comment }}</td>
    </tr>
</table>
    <a href="{{ route('product.edit', $product->id)}}"><input type="submit" name="" value="編集"></a>
    <p><a href="{{ route('product.index')}}">戻る</a></p>
