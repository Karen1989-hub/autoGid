<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExcursionRequest extends FormRequest
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
            'title'=>'required',
            'address'=>'required',
            'time'=>'required',
            'complexity'=>'required',
            'type'=>'required',
            'distance'=>'required',
            'description'=>'required',
            'price'=>'required',
            'img'=>['mimes:png,jpg']   

        ];
    }
}
