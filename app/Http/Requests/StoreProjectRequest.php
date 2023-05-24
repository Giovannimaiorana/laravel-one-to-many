<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:projects,title',
            'description' => 'nullable|max:65000',
            'link' => 'nullable|url|max:255',
            'preview_image' => 'nullable|url|max:255',
        ];
    }
}
