@extends('layouts.app')

@section('content')





@can('create', \App\Models\Product::class)
    <a href="">Sukurti nauja</a>
@endcan
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Prekės') }}</div>

                    <div class="card-body">
                        <table class="table">
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
                                    <td style="width: 100px; " class="text-right">{{ $product->price_eur }}</td>
                                    <td style="width: 100px; " class="text-right">{{ $product->price_vat }}</td>
                                    <td>
                                        @can('update', $product)
                                            <a href="{{ route("products.edit", $product->id) }}">Redaguoti</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
