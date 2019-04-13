<?php

namespace App\Http\Controllers\API;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends BaseController
{
    //
    public function create(Request $request) {
        $data = $request->json()->all();

        $result = json_decode(json_encode($data),true);

        //Get User Id
        $userId = $result['user_id'];
        $order = new Order([
            'user_id' => $userId,
            'order_status' => "NOT ACCEPTED",
            'amount' => $result['amount']
        ]);
        $order->save();
        foreach ($result['product_orders'] as $item) {

            $orderItem = new OrderItem([
                'item_id' => $item['product_id'],
                'quantity' => $item['quantity']
            ]);
            $order->items()->save($orderItem);
        }
        return $this->sendResponse("Success", 'Order Placed Successfully.');
    }

    public function show($id) {
        $order = Order::find($id);
        if($order == null) {
            return $this->sendError("Invalid Order ID", "Error");
        }
        return $this->sendResponse($order , "Success");
    }

    public function orderItems($id) {
        $order = Order::find($id);
        if($order == null) {
            return $this->sendError("Invalid Order ID", "Error");
        }
        return $this->sendResponse($order->items()->get() , "Success");
    }
}
