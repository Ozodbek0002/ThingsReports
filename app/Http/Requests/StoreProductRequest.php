<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required',
            'image' => 'required',
            'code' => 'required|digits:10|unique:products,code',
            'category_id' => 'required',
            'unit_id' => 'required',
            'room_id' => 'required',
        ];


    }
}
