<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function update(Request $request , $id)
    {
        $order = Order::where('wp_id', $id)->first();
        $order->status = $request->input('status');
        return response()->json(['success' => $order->save()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required',
            'currency' => 'required',
            'created_at' => 'required',
            'total' => 'required',
            'payment_method_title' => 'required',
            'items' => 'required'
        ]);
        $order = Order::create($request->all());
        $items = $request->input('items');
        if (!empty($items)) {
            $objItems = [];
            foreach ($items as $item) {
                $objItems[] = new OrderItem([
                    'wp_product_id' => $item['id'],
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'total' => $item['total'],
                    'price' => $item['price']
                ]);
            }
            $order->items()->saveMany($objItems);
        }
        return response()->json(['order' => $order->id]);
    }
}
