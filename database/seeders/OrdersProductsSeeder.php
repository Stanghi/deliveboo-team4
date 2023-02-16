<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\DumpCommand;
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

        foreach ($orders as $order) {
            $order_id = $order->id;
            $restaurant_products = $order->restaurant->products;
            $products = [];

            for ($i = 0; $i < 10; $i++) {
                $product_id = $restaurant_products[rand(0, count($restaurant_products) - 1)]->id;

                if(key_exists($product_id, $products)) {
                    $products[$product_id]++;
                } else {
                    $products += [$product_id => 1];
                }
            }

            foreach($products as $key=>$value) {
                $order->products()->attach($key, ['quantity' => $value]);
            }
        }
    }
}
