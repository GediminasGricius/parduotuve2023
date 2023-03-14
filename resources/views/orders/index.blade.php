@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Užsakymai') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->date->format('Y-m-d') }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>
                                        <table>
                                            <tbody>
                                            @foreach( $order->products as $product )
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->description }}</td>
                                                    <td>{{ $product->pivot->price }} EUR</td>
                                                    <td>{{ $product->pivot->count }} vnt.</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        Viso užsakymų: {{ $orders->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>




</table>
@endsection
