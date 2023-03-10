
<img src="{{ asset("/storage/static/shop.jpg") }}" style="width: 100px;">


<a href="{{ route("pdf.get","5.pdf") }}">Parsiųsti dokumentacją</a>
<hr>
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
        <td><a href="{{ route("products.edit", $product->id) }}">Redaguoti</a> </td>
    </tr>
    @endforeach
    </tbody>
</table>
