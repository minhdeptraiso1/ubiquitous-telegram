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
        'price'=> 'required|numeric|min:0',
        'feature_image_path'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_path.*'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' =>'required|exists:categories,id',
        'contents'=>'required|min:10',
        'quanty' => 'required|numeric|min:1'
    ];
}

public function messages()
{
    return [
        'name.required' => 'Tên không được để trống',
        'name.unique' => 'Tên sản phẩm này đã tồn tại',
        'name.min' => 'Tên không được dưới 5 kí tự',
        'name.max' => 'Tên không được vượt quá 255 kí tự',
        'price.required' => 'Giá không được để trống',
        'price.numeric' => 'Giá phải là một số',
        'price.min' => 'Giá không được âm',
        'category_id.required' => 'Danh mục không được để trống',
        'category_id.exists' => 'Danh mục được chọn không tồn tại',
        'contents.required' => 'Nội dung không được để trống',
        'contents.min' => 'Nội dung phải có ít nhất 10 kí tự',
        'feature_image_path.required' => 'Ảnh đại diện không được để trống',
        'feature_image_path.image' => 'Ảnh đại diện phải là file hình ảnh',
        'feature_image_path.mimes' => 'Ảnh đại diện phải có định dạng: jpeg, png, jpg, gif',
        'feature_image_path.max' => 'Ảnh đại diện không được vượt quá 2MB',
        'image_path.*.image' => 'Ảnh chi tiết phải là file hình ảnh',
        'image_path.*.mimes' => 'Ảnh chi tiết phải có định dạng: jpeg, png, jpg, gif',
        'image_path.*.max' => 'Mỗi ảnh chi tiết không được vượt quá 2MB',
        'quanty.required' => 'Số lượng không được để trống',
        'quanty.numeric' => 'Số lượng phải là một số',
        'quanty.min' => 'Số lượng phải lớn hơn 0'
    ];
}

}
