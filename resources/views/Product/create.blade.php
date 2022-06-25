
<h1>商品登録画面</h1>
<p><a href="{{ route('product.index')}}">一覧画面</a></p>

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="product_name">商品名</label>
        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="商品名" value="{{ old ('product_name') }}">
      </div>

      <div class="form-group">
        <label for="company_id">メーカー</label>
        <select name="company_id">
          <option value="">全て</option>
          @foreach($companies as $company)
          <option value="{{ $company->id }}">{{ $company->company_name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="price">価格</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="価格" value="{{ old('price') }}">
      </div>

      <div class="form-group">
        <label for="stock">在庫数</label>
        <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数" value="{{ old('stock') }}">
      </div>

      <div class="form-group">
        <label for="comment">コメント</label>
        <textarea class="form-control" id="comment" name="comment" placeholder="コメント"></textarea>
      </div>

      <div class="form-group">
        <label for="img_path">商品画像</label>
        <input type="file" class="form-control" id="img_path" name="img_path" placeholder="url">
      </div>
      
      <input type="submit" value="登録する">
</form>
