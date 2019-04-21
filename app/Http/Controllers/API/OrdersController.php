<?php

namespace App\Http\Controllers\API;

use App\Logger;
use App\Order;
use App\OrderItem;
use App\User;
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
        $user = User::find($userId);
        $order->save();
        foreach ($result['product_orders'] as $item) {

            $orderItem = new OrderItem([
                'item_id' => $item['product_id'],
                'quantity' => $item['quantity']
            ]);
            $order->items()->save($orderItem);
        }
        $clientIP = \Request::getClientIp(true);
        $userLog = Logger::create([
            'email' =>  $user->email,
            'ip_address' => $clientIP,
            'action'    => "Success : ".$user->name." has placed an order of amount ".$order->amount,
        ]);

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

    public function getUserOrders(User $user) {
        $orders = $user->orders->sortByDesc('updated_at');

        return $this->sendResponse($orders , "Success");

    }
}
