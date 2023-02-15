<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $arr_orders = config('orders.orders');

        for ($i = 0; $i < count($orders); $i++) {
            foreach($arr_orders[$i]['products'] as $product) {
                $orders[$i]->products()->attach($product['product_id'], ['quantity' => $product['quantity']]);
            }
        }
    }
}
