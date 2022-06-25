<h1>編集画面</h1>
<p><a href="{{ route('product.index')}}">一覧画面</a></p>

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
 
<form action="{{ route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="id">商品情報ID</label>
      <p>{{ $product->id }}</p>
    </div>


    <div class="form-group">
        <label for="product_name">商品名</label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}">
      </div>

      <div class="form-group">
        <label for="company_id">メーカー</label>
        <select name="company_id">
          @foreach($companies as $company)
          <option value="{{ $company->id }}">{{ $company->company_name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="price">価格</label>
        <input type="text" class="form-control" id="price" name="price"  value="{{ $product->price }}">
      </div>

      <div class="form-group">
        <label for="stock">在庫数</label>
        <input type="text" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
      </div>

      <div class="form-group">
        <label for="comment">コメント</label>
        <textarea class="form-control" id="comment" name="comment">{{ $product->comment }}</textarea>
      </div>

      <div class="form-group">
        <label for="img_path">商品画像</label>
        <input type="file" class="form-control" id="img_path" name="img_path">{{ $product->img_path }}
      </div>

    <input type="submit" value="更新">
</form>