@extends('layout')
@section('title', '#' . $order->wp_id . ' Order Detail')
@section('content')
    <div class="container">
        <h3 class="text-center">Order #{{ $order->wp_id }}</h3>
        <hr>
        <h5>Order Information</h5>
        <table class="table table-bordered">
            <tr>
                <th width="20%">Status</th>
                <td><span class="text-capitalize">{{ $order->status }}</span></td>
            </tr>
            <tr>
                <th>Payment Method</th>
                <td>{{ $order->payment_method }}</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>{{ number_format($order->total) }} {{ $order->currency }}</td>
            </tr>
            <tr>
                <th>Billing Address</th>
                <td>
                    @php
                        $billing = json_decode($order->billing, true);
                        echo $billing['first_name'] . ' ' . $billing['last_name'] . '<br>';
                        echo $billing['address_1'] . ', ' .$billing['address_2'] . '<br>';
                        echo $billing['city'] . ', ' . $billing['country'] . '<br>';
                        echo $billing['email'] . '<br>';
                        echo $billing['phone'];
                    @endphp
                </td>
            </tr>
            <tr>
                <th>Shipping Address</th>
                <td>
                    @php
                        $shipping = json_decode($order->shipping, true);
                        echo $shipping['first_name'] . ' ' . $shipping['last_name'] . '<br>';
                        echo $shipping['address_1'] . ' ' .$shipping['address_2'] . '<br>';
                        echo $shipping['city'] . ' ' . $shipping['country'];
                    @endphp
                </td>
            </tr>
        </table>
        <h5>Order Items</h5>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>
            </tr>
            </thead>
            <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td class="text-right">{{ number_format($item->price) }}</td>
                <td class="text-center">{{ number_format($item->quantity) }}</td>
                <td class="text-right">{{ number_format($item->total) }}</td>
            </tr>
                @php
                $total += $item->total;
                @endphp
            @endforeach
            <tr>
                <th colspan="3" class="text-right">TOTAL</th>
                <th class="text-right">{{ number_format($total) }}</th>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
