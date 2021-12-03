<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillSubmitRequest extends FormRequest
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
    { //$name,$id_customer_info,$order_date, $expected_delivery_date, $address, $phone, $email
        return [
            // 'id_bill' => 'required||numeric|min:1', //name của ô input 
            // 'id_customer_info' => 'required|numeric|min:1',
            // 'order_date' => 'required',
            // 'expected_delivery_date' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            // 'id_payment' => 'required|numeric|min:1',
            'total_price' => 'required|numeric|min:999',
        ];
    }
    public function messages()
    {
        return[
            'required' => ':attribute không được để trống',
            'email' => ':attribute đúng định dạng Example@gmail.com',
            'min' => ':attribute không được nhỏ hơn :min',
        ];
    }

    public function attributes()
    {
        return [
           
            'order_date' => 'Ngày đặt',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
            'email' => 'email',
            
            'total_price' => 'Tổng tiền',
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
