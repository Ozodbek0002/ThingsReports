<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required',
            'code'=>'required',
            'category_id'=>'required',
            'unit_id'=>'required',
            'amount'=>'required',
            'room_id'=>'required',
        ];
    }
}
