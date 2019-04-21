<?php

namespace App\Http\Controllers;

use App\Logger;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        $orders = $orders->whereNotIn('order_status', ['DECLINED','FINISHED','INCOMPLETE'])->sortByDesc('updated_at');
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function accept(Order $order) {

        $order->order_status = "ACCEPTED";
        $order->save();

        $user = User::findOrFail($order->user->id);
        $clientIP = \Request::getClientIp(true);
        $userLog = Logger::create([
            'email' =>  $user->email,
            'ip_address' => $clientIP,
            'action'    => "Success : ".$user->name."'s Order Has Been Accepted by ".Auth::user()->name,
        ]);

        flash('Successfully Accepted The Order');
        return redirect('/order');

    }

    public function decline(Order $order) {
        $order->order_status = "DECLINED";
        $order->save();

        $user = User::findOrFail($order->user->id);
        $clientIP = \Request::getClientIp(true);
        $userLog = Logger::create([
            'email' =>  $user->email,
            'ip_address' => $clientIP,
            'action'    => "Success : ".$user->name."'s Order Has Been Declined by ".Auth::user()->name,
        ]);

        flash('Successfully Declined The Order');
        return redirect('/order');

    }

    public function complete(Order $order) {
        $order->order_status = "READY";
        $order->save();

        $user = User::findOrFail($order->user->id);
        $clientIP = \Request::getClientIp(true);
        $userLog = Logger::create([
            'email' =>  $user->email,
            'ip_address' => $clientIP,
            'action'    => "Success : ".$user->name."'s Order Has Been Completed by ".Auth::user()->name,
        ]);
        flash('Successfully Completed The Order');
        return redirect('/order');

    }

    public function finished(Order $order) {
        $order->order_status = "FINISHED";
        $order->save();

        $user = User::findOrFail($order->user->id);
        $clientIP = \Request::getClientIp(true);
        $userLog = Logger::create([
            'email' =>  $user->email,
            'ip_address' => $clientIP,
            'action'    => "Success : ".$user->name."'s Order Has Been picked up",
        ]);

        flash('Successfully Finished The Order');
        return redirect('/order');

    }

    public function userDisabled(Order $order) {
        $order->order_status = "INCOMPLETE";
        $order->save();
        $user = User::find($order->user->id);
        $user->fine = $user->fine + $order->amount;
        $user->save();

        $user = User::findOrFail($order->user->id);
        $clientIP = \Request::getClientIp(true);
        $userLog = Logger::create([
            'email' =>  $user->email,
            'ip_address' => $clientIP,
            'action'    => "Success : ".$user->name."'s did not receive their order",
        ]);
        flash('Successfully Finished The Order');
        return redirect('/order');

    }

}
