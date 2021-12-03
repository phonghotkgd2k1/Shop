<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer_infoSubmitRequest;
use App\Models\Admin\Customer_info;
use App\Models\Admin\getAllCustomer;
use Illuminate\Http\Request;

class Customer_infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(1);
        // $Customer_info = getAllCustomer_info::getAllCustomer_info();
        $Customer_info = Customer_info::getAllCustomer_info();

        return view('Admin.Customer_info.Customer_info', compact(
            'Customer_info'
        ));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Customer_info $Customer_info
     * @return \Illuminate\Http\Response
     */
    public function Customer_infoForm(Request $request)
    {
        $id_Customer_info = $request->id_customer_info;

        if (isset($id_Customer_info)) {
            $Customer_info = Customer_info::Customer_infoDetail($id_Customer_info)[0];
    
            return view('Admin.Customer_info.Customer_info_form', compact('Customer_info'));
        } else {
            return view('Admin.Customer_info.Customer_info_form');        
        }
        
    }
    
    
    public function Customer_infoSubmit(Customer_infoSubmitRequest $request)
    {
        $id_Customer_info = $request->id_customer_info;
        $username = $request->username;
        $password = $request->password;
        $name = $request->name;
        $sex = $request->sex;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        $isactive = $request->isactive == null ? 1 : 0;
        // $id_payment = $request->id_payment;
        
        if(isset($id_Customer_info) && $id_Customer_info > 0) {
            $Customer_info = Customer_info::updateCustomer_info($id_Customer_info,$username, $password, $name, $sex, $address, $phone, $email, $isactive);
            
            return $Customer_info == true ? redirect()-> route('admin.Customer_info.index')->with('msgSuc', 'Cập nhật thông tin thành công')
                                   : redirect()-> back()->with('msgErr', 'Cập nhật thông tin không thất bại!')->withInput();
        }else {
            $Customer_info = Customer_info::createCustomer_info($username, $password, $name, $sex, $address, $phone, $email, $isactive);
            if ($Customer_info == null) {
                return redirect()->back()->with('msgErr', 'Tạo thông tin thất bại!')->withInput();
            }
            return redirect()->route('admin.Customer_info.index')->with('msgSuc', 'Thêm khách hàng thành công');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeIsActive(Request $request)
    {
        $id_Customer_info = $request->id_customer_info;
        $isActive = $request->is_active;

        
        $updateCustomer_info = Customer_info::changeIsActive($id_Customer_info, $isActive);

        if ($updateCustomer_info) {
            return redirect()->route('admin.Customer_info.index')->with('msgSuc', 'Thay đổi trạng thái thành công');
        } else {
            return redirect()->route('admin.Customer_info.index')->with('msgErr', 'Thất bại!');
        }
    }
}
