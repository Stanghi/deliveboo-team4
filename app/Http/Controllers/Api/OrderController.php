<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $cart = json_decode($request->cart);
        $nonce = $request->payment_method_nonce;
        $amount = 0;
        $cart_items = $cart->items;
        foreach ($cart_items as $item) {
            $product = Product::find($item->product);
            $amount += $product->price * $item->quantity;
        }

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'cart' => $cart,
                'amount' => $amount,
                'message' => "Transazione eseguita con Successo!"
            ];

            return response()->json($data, 200);

        } else {
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!"
            ];
            return response()->json($data, 401);
        }
    }
}

//CREDIT CARD
// 5555555555554444
