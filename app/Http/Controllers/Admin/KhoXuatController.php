<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KhoXuat;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Admin;
use Session;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class KhoXuatController extends Controller
{
    public function index()
    {
        $khoxuat = KhoXuat::getAllKhoXuat();
        
        return view('Admin.kho.khoxuat', compact(
            'khoxuat'
        ));
    }
    public function khoXuatDetail(Request $request)
    {
            $id = $request->id;
            $khoxuat = KhoXuat::khoXuatDetail($id);

            return view('admin.kho.khoxuatDetail', compact('khoxuat'));
    }
    public function khoXuatForm(Request $request)
    {
        $product = Product::getAllProduct();
        //lấy id admin dùng session
        $username = Session::get('username');
        //lấy thông tin admin từ db vs username ở trên 
        $admin = Admin::findAdmin($username);
        // dd($admin);
        //gọi sang function bên admin model
        // dd($admin);
        //dd($product);
        // if (isset($id) && $id > 0) {
        //     $khoxuat = KhoXuat::khoXuatDetail($id);
        // //    if ($khoxuat){
        // //        $khoxuat = $khoxuat[0];
        // //    }
        //     return view('Admin.kho.khoxuatForm', compact('khoxuat'));
        // } else {
            return view('Admin.kho.khoxuatForm',[
                'product' => $product,
                "admin" => $admin
            ]);
        // }
    }
    public function khoXuatSubmit(Request $request)
    {
        $id_product = $request->name;
        $created_at = $request->created_at;
        $id_admin = $request->admin;
        $quantity = $request->quantity;
        $product = Product::productDetail($id_product);
        if($quantity < 0){
            $quantity = 0;
        }
        if($product->quantity < $quantity){
            $quantity = $product->quantity;
        }
        if($product->quantity != 0){
            KhoXuat::createKhoXuat('Phong',$id_product,$id_admin,$quantity,$created_at);
            $quantity_product = $product->quantity - $quantity;
            DB::update("UPDATE product SET quantity = '$quantity_product' WHERE id_product = '$id_product'");
        }
        //return về route nào đó
        return $quantity_product == true ? redirect()->route('admin.khoxuat.index')->with('msgSuc', 'Cập nhật sản phẩm thành công') : redirect()->back()->with('msgErr', 'Cập nhật sản phẩm thất bại!')->withInput();//còn mỗi bieẻu với cái này thoii nhé  , file này ông lưu chỗ nào z
        // return redirect()->route('admin.khoxuat.index');
        //insert len db bang xuat kho 
        
        // if (isset($khoxuat)  && $khoxuat > 0) {
        //     $UpdateKhoXuat = KhoXuat::updateKhoXuat($id_product,$created_at,$id_admin,$quantity);
            

        //     return $UpdateKhoXuat == true ? redirect()->route('admin.khoxuat.index')->with('msgSuc', 'Cập nhật kho xuất thành công')
        //                     : redirect()->back()->with('msgErr', 'Cập nhật kho xuất thất bại!')->withInput();
        // } else {
        //     $khoxuat = KhoXuat::createKhoXuat($id_product,$created_at,$id_admin,$quantity);
           
        
        //     if ($khoxuat == null) {
        //         return redirect()->back()->with('msgErr', 'Thêm kho xuất thất bại!')->withInput();
        //     }
            
        //     return redirect()->route('admin.khoxuat.index')->with('msgSuc', 'Thêm sản phẩm thành công!');
        // }
    //    dd($quantity_product);
        
        
        
        
        

        // if (isset($id)) {
           
        //     $khoxuat = KhoXuat::updateKhoXuat( $name,$id_product, $name_product, $name_admin,$quantity,$date_xuat);
        //     // dd($bill);
        //     return $khoxuat == true ? redirect()->route('admin.khoxuat.index')->with('msgSuc', 'Lưu bản ghi thành công')
        //                     : redirect()->back()->with('msgErr', 'Lưu bản ghi không thành công!')->withInput();
        // } else {
        //     $khoxuat = KhoXuat::createKhoXuat($name, $name_product, $name_admin,$quantity,$date_xuat);        
        //     if ($khoxuat == null) {
        //         return redirect()->back()->with('msgErr', 'Lưu bản ghi không thành công!')->withInput();
        //     }
            
        //     return redirect()->route('admin.khoxuat.index');
        // }
        
    }
}
