<form action="{{ route("products.update", $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <input type="text" name="name" value="{{$product->name}}"><br>
    <input type="text" name="price" value="{{$product->price}}"><br>
    <input type="file" name="picture" value=""><br>
    <button>Išsaugoti</button>
</form>
