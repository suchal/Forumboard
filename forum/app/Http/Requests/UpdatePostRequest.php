<?php

namespace App\Http\Requests;

use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $post = Post::findFromSlug($this->slug);
        return $post->user_id == $this->user()->id;
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
