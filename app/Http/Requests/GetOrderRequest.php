<?php

namespace App\Http\Requests;

use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use Illuminate\Foundation\Http\FormRequest;


/**
 * @property string who_receives
 * @property string description
 * @property int department
 * @property int municipality
 * @property string address
 * @property int phone
 * @property int user_id
 * @property int client_id
 * @property ListProductGetOrderDTO[] list_product
 */
class GetOrderRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'client_id' => 'required|numeric',
            'phone' => 'required|numeric',
            'list_product' => 'required|array',
            'address' => 'required|alpha_dash',
            'municipality' => 'required|numeric',
            'department' => 'required|numeric',
            'description' => 'required|alpha_dash',
            'who_receives' => 'string'
        ];
    }
}
