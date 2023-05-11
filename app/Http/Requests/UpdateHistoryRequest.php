<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHistoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required',
            'product_id' => 'required',
            'from_room_id' => 'required',
            'to_room_id' => 'required',
        ];
    }
}
