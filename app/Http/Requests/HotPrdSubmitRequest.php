<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotPrdSubmitRequest extends FormRequest
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
            'id_hot_product' => 'required|numeric|min:1', //name của ô input
            
            'id_product' =>'required|numeric|min:1',
            
        ];
    }
    public function messages()
    {
        return[
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
        ];
    }

    public function attributes()
    {
        return [
            'id_hot_product' => 'Mã sản phẩm nổi bật',
            
            'id_product'  => 'Mã sản phẩm',
          
        ];
    }





    // public function rules()
    // {
    //     if ($this->input('id_product') != null && $this->input('id_product') > 0) {
    //         return [
    //             'name' => 'required',
    //             'discount' => 'numeric|max:100',
    //             'price' => 'required|numeric|min:0',
    //             'product_type' => 'required',
    //             'brand' => 'required',
    //             'quantity' => 'required|numeric|min:0',
    //         ];
    //     } else {
    //         return [
    //             'images' => 'required',
    //             'name' => 'required',
    //             'discount' => 'numeric|max:100',
    //             'price' => 'required|numeric|min:0',
    //             'product_type' => 'required',
    //             'brand' => 'required',
    //             'quantity' => 'required|numeric|min:0',
    //         ];
    //     }
    // }
    // public function messages()
    // {
    //     return[
    //         'required' => ':attribute không được để trống',
    //         'numeric' => ':attribute phải là số ',
    //         'min' => ':attribute không được nhỏ hơn :min',
    //         'max' => ':attribute không được lớn hơn :max'
    //     ];
    // }

    // public function attributes()
    // {
    //     return [
    //         'images' => 'Ảnh',
    //         'name' => 'Tên sản phẩm',
    //         'discount' => 'Giảm giá',
    //         'price' => 'Giá',
    //         'product_type' => 'Loại sản phẩm',
    //         'brand' => 'Nhãn hiệu sản phẩm',
    //         'quantity' => 'Số lượng',
    //         'content' => 'Mô tả',
    //         'description' => 'Chi tiết sản phẩm',
    //     ];
    // }
}
