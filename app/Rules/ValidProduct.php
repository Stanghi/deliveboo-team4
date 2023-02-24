<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class ValidProduct implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $cart = $value;
        $cart_items = $cart['items'];
        $cart_restaurant_id = $cart['restaurant']['id'];

        foreach ($cart_items as $item) {
            $product = Product::find($item['product']['id']);
            if ($product) {
                if ($product->restaurant_id === $cart_restaurant_id) {
                    if ($cart_restaurant_id === $item['product']['restaurant_id']) {
                        return true;
                    }
                }
            } else {
                return false;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
