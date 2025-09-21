<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
    return [
        'name' =>'bail|required|unique:products|max:255|min:5',
        'price'=> 'required',
        'feature_image_path'=>'required',
        'category_id' =>'required',
        'contents'=>'required',
        'quanty' => 'required|numeric|min:1'
    ];
}

public function messages()
{
    return [
        'name.required' => 'Tên không được để trống',
        'name.unique' => 'Tên không được trùng',
        'name.min' => 'Tên không được dưới 5 kí tự',
        'price.required' => 'Giá không được để trống',
        'category_id.required' => 'Danh mục không được để trống',
        'contents.required' => 'Nội dung không được để trống',
        'feature_image_path'=> 'Ảnh không ',
        'quanty.required' => 'Số lượng không được để trống',
        'quanty.numeric' => 'Số lượng phải là một số',
        'quanty.min' => 'Số lượng phải lớn hơn 0'
    ];
}

}
