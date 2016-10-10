<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title'         => 'required|min:10|max:70',
            'content'       => 'required|min:100|max:10000',
            'type_id'       => 'required',
            'category_id'   => 'required',
            'city_id'       => 'required',
        ];
    }
}
