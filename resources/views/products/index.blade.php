
<img src="{{ asset("/storage/static/shop.jpg") }}" style="width: 100px;">


    <a href="{{ route("pdf.get","5.pdf") }}">Parsiųsti dokumentacją</a>
    <hr>

@can('create', \App\Models\Product::class)
<a href="">Sukurti nauja</a>
@endcan
<table border="1">
    <tbody>
    @foreach($products as $product)
    <tr>
        <td>
            @if ($product->picture!=null)
            <img src="{{ asset("/storage/products/".$product->picture) }}" style="width: 150px">
            @endif
        </td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>
            @can('update', $product)
                <a href="{{ route("products.edit", $product->id) }}">Redaguoti</a>
            @endcan
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
