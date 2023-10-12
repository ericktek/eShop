<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // dont' forget to set this as true
        return true;
    }

    public function rules(): array
    {
        // make all of the fields required, set featured image to accept only images
        return [
            'title' => 'required|string|min:3|max:250',
            'content' => 'required|string|min:3|max:6000',
            'price' => 'required|string',
            'featured_image' => 'required|image|max:5120|mimes:jpg,jpeg,png',
        ];
    }

}
