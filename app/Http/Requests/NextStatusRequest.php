<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NextStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "orders_id" => "required",

        ];
    }
}
