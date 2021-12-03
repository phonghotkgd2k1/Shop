<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSubmitRequest extends FormRequest
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
        if ($this->input('id_product') != null && $this->input('id_product') > 0) {
            return [
                'name'=> 'required', //name của ô input
                'brand' => 'required',
                // 'content'=>'required',
                'price' => 'required|numeric|min:100000',
                'discount' => 'required|numeric|max:99',
                'quantity' => 'required|numeric|min:1',
                // 'description' =>'required',
                // 'price' => 'required|numeric|min:0',
            ];
        } else {
            return [
                'name'=> 'required', //name của ô input
                'images' =>'required',
                'brand' => 'required',
                // 'content'=>'required',
                'price' => 'required|numeric|min:100000',
                'discount' => 'required|numeric|max:99',
                'quantity' => 'required|numeric|min:1',
                // 'description' =>'required',
                // 'price' => 'required|numeric|min:0',
            ];
        }
    }
    public function messages()
    {
        return[
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute phải là số ',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'images'  => 'Tên ảnh',
            // 'content' => 'Nội dung',
            'price'   => 'Giá sản phẩm ',
            'discount' => 'Giảm giá',
            'quantity' => 'Số lượng',
            // 'description'=> 'Chi tiết',
            'brand'  => 'Mã nhãn hiệu'
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
