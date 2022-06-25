<h1>一覧画面</h1>

<div class="search">
    <form action="{{ route('product.index') }}" method="GET">
         @csrf

        <div class="form-group">
            <label for="">商品名
                <div><input type="text" name="keyword" value=" {{ $keyword }} "></div>
            </label>
            
            <label for="">メーカー名
                <div>
                    <select name="company_id">
                        <option value="{{ $company_id }}">全て</option>
                        @foreach ($products as $product)
                            <option value="{{ $company_id }}">{{ $product->company->company_name }}</option>
                        @endforeach
                    </select>
                </div>
            </label>
        </div>

        <div><input type="submit" class="btn" value="検索"></div>
    </form>
</div>

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
        <td><img src="{{ Storage::url($product->img_path) }}"></td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>{{ $product->company->company_name }}</td>
        <th><a href="{{ route('product.show',$product->id)}}">詳細表示</a></th>
        <th>
            <form action="{{ route('product.destroy', $product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="削除" onclick='return confirm("削除しますか");'>
            </form>
        </th>
    </tr>
    @endforeach
</table>