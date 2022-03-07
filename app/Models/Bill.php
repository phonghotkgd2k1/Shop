<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bill extends Model
{
    use HasFactory;

    // public static function getAllBill()
    // {       
    //     $Bill = DB::table('bill')
    //               ->select('bill.*')
    //               ->join('customer_info', 'customer_info.id_customer_info', '=', 'bill.id_customer_info')
    //               ->where('id_customer_info');
                
    //    return $Bill;
    // }

    public static function getBillByID($idProduct) {
        $bill = DB::table('bill_detail')
                         ->select('bill_detail.*')
                         ->join('product', 'product.id_product', '=', 'product.id_product')
                         ->where('product.id_product', '=', $idProduct)
                         ->first();
             if ($bill == null)
             abort(404);
             return $bill;
     }
     
    public static function createBill($id_bill, $expected_delivery_date, $phone, $email, $address, $isactive)      
    {
        return DB::insert ('insert into bill (expected_delivery_date, phone, email, address, isactive)
         values (?,?,?,?,?,?)', [$expected_delivery_date, $phone, $email, $address, $isactive, $id_bill]);
    }
 
}
