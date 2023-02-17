<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'name' => 'required|min:2|max:100',
            'address' => 'required|min:5|max:100',
            'telephone' => 'required|min:5|max:100',
            'iva' => 'required|min:11|max:11',
            'img' => 'nullable|image|max:3000',
        ];
    }
}
