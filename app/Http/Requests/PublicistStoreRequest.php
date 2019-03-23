<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicistStoreRequest extends FormRequest
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
            'gender'=>'required',
            'province_id'=>'required',
            'city_id'=>'required',
            'zone'=>'required|string',
            'fancy_name'=>'required|string',
            'age'=>'required|numeric',
            'height'=>'required|numeric',
            'measurements'=>'required|numeric',
            'schedules'=>'required|string',
            'phone'=>'required|numeric',
            'rate'=>'required|string',
            'payment_methods'=>'required|string',
            'presentation'=>'required|string',
            'main_photo'=>'required|image',
        ];
    }
}
