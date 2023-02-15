<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr_orders = config('orders.orders');
        foreach ($arr_orders as $order) {
            $new_order = new Order();
            $new_order->name = $order['name'];
            $new_order->surname = $order['surname'];
            $new_order->restaurant_id = $order['restaurant_id'];
            $new_order->email = $order['email'];
            $new_order->telephone = $order['telephone'];
            $new_order->address = $order['address'];
            $new_order->amount = $order['amount'];

            $new_order->save();
        }
    }
}
