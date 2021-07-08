<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Brand;

class CreateBrandRequest extends FormRequest
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
        $rules= Brand::$rules;
        $rules['title_ar']='required|unique:brands,title_ar,id';
        $rules['title_en']='required|unique:brands,title_en,id';
        return $rules;
    }
}