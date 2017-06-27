<?php

namespace App\Http\Controllers;

use App\Order;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function saveorder(Request $request)
    {
        $data = $request->except('_token');
        Session( ['data' => $data]);

        return redirect()->route('order.page',$data['service']);
    }

    public function orderPage($id)
    {
        $service = Service::find($id);
        return view('website.order-page',compact('service'));
    }

    public function makeOrder(Request $request)
    {
        $data = $request->session()->pull('data');
        $existing_order = Order::where('service_id',$data['service'])->where('user_id',\Auth::user()->id);

        if(! count($existing_order) > 0) {
            $order = new Order();
            $order->service_id = $data['service'];
            $order->user_id = \Auth::user()->id;
            $order->sp_id = $data['sp'];
            $order->price = $data['price'];
            $order->save();

            $message = 'You have successfully ordered this service';

        }else{

            $message = 'You have already ordered this service';
        }
        

        return redirect()->route('services')->withMessage($message);
    }

    public function spOrders()
    {
        $id = \Auth::user()->serviceProvider->id;

        $orders = Order::where('sp_id',$id)->get();
    
        return view('service_providers.orders.index',compact('orders'));
    }
}
