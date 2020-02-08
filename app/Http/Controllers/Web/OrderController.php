<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);

        return view('order.list', [
            'orders' => $orders
        ]);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.detail', ['order' => $order]);
    }
}
