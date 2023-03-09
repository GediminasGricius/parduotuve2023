<h5>Užsakymo informacija:</h5>
<p><strong>Užsakymo data:</strong> {{ $order->date->format("Y-m-d") }}</p>
<p><strong>Užsakovas:</strong> {{$order->user->name}}</p>
<hr>
<h5>Prekės užsakyme</h5>
<table>
    <tbody>
    @foreach($order->products as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->pivot->count}} vnt.</td>
        <td>{{$product->pivot->price}} EUR</td>
        <td><a href="{{ route("orders.deleteProduct", [$order->id, $product->id]) }}">Ištrinti prekę</a> </td>
    </tr>
    @endforeach
    </tbody>
</table>
<hr>
<h5>Pridėti prekę</h5>
<form method="post" action="{{ route("orders.addProduct", $order->id) }}">
    @csrf

    <input type="text" name="count" value="1">
    <br>
    <select name="product_id">
        @foreach($products as $product)
            <option value="{{ $product->id }}"> {{ $product->name }} / {{$product->price}} EUR</option>
        @endforeach
    </select>
    <br>
    <button >Pridėti prekę</button>

</form>
