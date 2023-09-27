<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id=$this->route('category');
        return Category::rules($id);
    }

    public function  messages()
    {
        return ['name.required' => 'Please enter name or whatever you want',
                'status.required' => 'fill the atatus inactive or active',
                'category_id.int' => 'fill the category must be unique...'];

    }
}
