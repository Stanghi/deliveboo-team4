<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index(){
        $user = Auth::user();
        $restaurant_id = $user->restaurants[0]->id;
        $orders = Order::where('restaurant_id', $restaurant_id)->orderBy('created_at', 'asc')->get();

        $numb_orders_by_month = [];
        $sales_by_month = [];

        foreach($orders as $order) {
            $order_month = $order->created_at->format('m/Y');
            if(key_exists($order_month, $numb_orders_by_month )) {
                $numb_orders_by_month[$order_month]++;
                $sales_by_month[$order_month] += $order->amount;
            } else {
                $numb_orders_by_month += [$order_month => 1];
                $sales_by_month += [$order_month => $order->amount];
            }
        }

        $statistics_data = [];
        $statistics_data['numb_orders_by_month'] = ['months' => array_keys($numb_orders_by_month) ];
        $statistics_data['numb_orders_by_month'] += ['total' => array_values($numb_orders_by_month) ];
        $statistics_data['$sales_by_month'] = ['months' => array_keys($sales_by_month) ];
        $statistics_data['$sales_by_month'] += ['sales' => array_values($sales_by_month) ];

        return view('admin.statistics.statistics', compact('statistics_data'));
    }
}
