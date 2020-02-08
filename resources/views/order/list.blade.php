@extends('layout')
@section('title', 'Orders')
@section('content')
    <div class="container">
        <h3 class="text-center">List Orders</h3>
        <hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Order ID</th>
                <th class="text-center">Status</th>
                <th class="text-center">Total Amount</th>
                <th class="text-center">Created At</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="text-center">{{ $order->wp_id }}</td>
                <td class="text-center"><span class="text-capitalize">{{ $order->status }}</span></td>
                <td class="text-right">{{ number_format($order->total) }}</td>
                <td class="text-center">{{ date('Y-m-d H:i', strtotime($order->created_at)) }}</td>
                <td class="text-center"><a href="{{ route('orderDetail', $order->id) }}" class="btn btn-sm btn-primary">View</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
