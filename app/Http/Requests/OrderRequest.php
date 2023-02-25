<?php

namespace App\Http\Requests;

use App\Rules\ValidProduct;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'payment_method_nonce' => 'required',
            // 'name' => 'required|min:2|max:50',
            // 'surname' => 'required|min:2|max:70',
            // 'email' => 'required|email',
            // 'address' => 'required|min:8|max:100',
            // 'telephone' => 'required|min:8|max:20',
            // 'note' => 'max:500',
            'cart' => [
                'required',
                new ValidProduct()
            ]
        ];
    }
}
