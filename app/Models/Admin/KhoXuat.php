<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KhoXuat extends Model
{
    use HasFactory;
    public static function getAllKhoXuat()
    {   
        $khoxuat = DB::table('khoxuat')
                    ->select('khoxuat.*', 'product.name AS name_product','admin.name AS name_admin', 'product_stock.name_product_stock AS name_product_stock')
                   
                    ->join('product', 'product.id_product', '=', 'khoxuat.id_product')
                    ->join('admin', 'admin.id_admin', '=', 'khoxuat.id_admin')
                    ->join('product_stock', 'product.id_product', '=', 'product.id_product')
                    ->orderBy('khoxuat.created_at', 'DESC')
                    ->paginate(10);
// dd($khoxuat);
        return $khoxuat;
    }
    public static function createKhoXuat ($name_khoxuat, $id_product, $id_admin, $quantity,$date_xuat)
    {
        return DB::insert ('insert into khoxuat (name_khoxuat,id_product,id_admin,quantity,date_xuat)
         values (?,?,?,?,?)', [$name_khoxuat, $id_product, $id_admin,$quantity,$date_xuat]);
    }
    public static function updateKhoXuat($id, $name_khoxuat, $name_product, $name_admin, $name_product_stock,$quantity,$date_xuat)
    {
        
        try {
            $khoxuat = DB::table('khoxuat')->where('id', $id)->first();
            
            if ($khoxuat == !null) {
                // dd($khoxuat);
                return false;
            }
            DB::update('update khoxuat set name_khoxuat = ?, name_product = ?, name_admin,name_product_stock,quantity,date_xuat, where id = ?',
                                     [$name_khoxuat, $name_product, $name_admin, $name_product_stock,$quantity,$date_xuat,$id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function khoXuatDetail($id) {
        $khoxuat = DB::select('select khoxuat.*, product.name AS name_product,admin.name AS name_admin, product_stock.name_product_stock AS name_product_stock
         from (((khoxuat
          inner join product on product.id_product = khoxuat.id_product)
          inner join product_stock on product_stock.id_product_stock = khoxuat.id_product_stock)
          inner join admin on admin.id_admin = khoxuat.id_admin)
          where id = ?', [$id]);
        // dd($bill);
        if ($khoxuat != null) {
            return $khoxuat[0];
        } else {
            return null;
        }
    }
}
