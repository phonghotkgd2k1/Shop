<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdminRequest;
use App\Models\Admin\Admin;
use App\Models\Admin\SuperAdmin;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SuperAdmin = SuperAdmin::getAllSuperAdmin();

        return view('Admin.SuperAdmin.SuperAdmin', compact('SuperAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminDetail(Request $request)
    {
        $id_SuperAdmin = $request->id_admin;

        $SuperAdmin = SuperAdmin::SuperAdminDetail($id_SuperAdmin);

        return view('admin.SuperAdmin.SuperAdmin_Detail', compact('SuperAdmin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminForm(Request $request)
    {
           
        $id_SuperAdmin = $request->id_admin;
        
        if (isset($id_admin) && $id_admin >0) {
            $SuperAdmin = SuperAdmin::SuperAdminDetail($id_admin);
    
            return view('Admin.SuperAdmin.SuperAdmin_Form', compact('SuperAdmin'));
        } else {
            return view('Admin.SuperAdmin.SuperAdmin_Form');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminSubmit(SuperAdminRequest $request)
    {   
        $username = $request->username;
        $password = $request->password;
        $name = $request->name;
        $images = $request->images;
        $sex = $request->sex;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        $role = $request->role ;
        $isactive = $request->isactive  == null ? 1 : 0;

        if (isset($id_admin)  && $id_admin > 0) {
            $UpdateProduct = Admin::updateProduct($id_admin,$username,$password, $name,$images,$sex,$phone,$email,$address,$role,$isactive);

            return $UpdateProduct == true ? redirect()->route('admin.product.index')->with('msgSuc', 'Cập nhật sản phẩm thành công')
                            : redirect()->back()->with('msgErr', 'Cập nhật sản phẩm thất bại!')->withInput();
        } else {
        $SuperAdmin = SuperAdmin::createSuperAdmin($username, $password, $name,$images, $sex, $phone, $email, $address,
        $role, $isactive);
            if ($SuperAdmin == null) {
                return redirect()->back()->with('msgErr', 'Tạo thông tin thất bại!')->withInput();
            }
            return redirect()->route('admin.SuperAdmin.index')->with('msgSuc', 'Thêm thành công quản lí');
        }
        
    }
    public function changeIsActive(Request $request)
    {
        $SuperAdmin = $request->id_admin;
        $isActive = $request->is_active;


        $updateAdmin =SuperAdmin::changeIsActive($SuperAdmin, $isActive);

        if ($updateAdmin) {
            return redirect()->route('admin.SuperAdmin.index')->with('msgSuc', 'Thay đổi trạng thái Admin thành công');
        } else {
            return redirect()->route('admin.SuperAdmin.index')->with('msgErr', 'Thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
