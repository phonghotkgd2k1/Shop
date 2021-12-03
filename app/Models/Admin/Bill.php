<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bill extends Model
{
    use HasFactory;
    public static function getAllBill()
    {   
        // try {
        //     $Bill = DB::select('SELECT * 
        //     FROM bill
        //     ORDER BY bill.created_at DESC');
        //     return $Bill; 
        // } catch(\Throwable $th){
        //     return null;
        // }
            
        // return DB::select("SELECT bill.id_bill, customer_info.name, bill.order_date, bill.expected_delivery_date, customer_info.address, customer_info.phone, customer_info.email, bill.total_price INNER JOIN customer_info ON bill.id_customer_info = customer_info.id_customer"); 
                        
        $Bill = DB::table('bill')
                  ->select('bill.*', 'customer_info.name AS name_customer','customer_info.address AS address_customer', 'customer_info.phone AS phone_customer','customer_info.email AS email_customer')
                  ->join('customer_info', 'customer_info.id_customer_info', '=', 'bill.id_customer_info')
                  ->orderBy('bill.created_at', 'DESC')
                  ->paginate(5);

       return $Bill;
   
    }

    public static function createBill ($name, $phone, $address, $email, $order_date, $expected_delivery_date, $total_price, $isactive)
    {
        return DB::insert ('insert into bill (name,phone, address, email, order_date, expected_delivery_date, total_price, isactive)
         values (?,?,?,?,?,?,?)', [$name,$phone,$address,$email, $order_date, $expected_delivery_date, $total_price, $isactive]);
    }

    public static function updateBill($id_bill, $name, $phone, $address, $email, $order_date, $expected_delivery_date, $total_price, $isactive)
    {
        
        try {
            $bill = DB::table('bill')->where('id_bill', $id_bill)->first();
            
            if ($bill == !null) {
                // dd($bill);
                return false;
            }
            DB::update('update bill set name = ?, phone = ?, address = ? email = ?, order_date = ?, expected_delivery_date = ?, total_price = ?, isactive = ?, where id_bill = ?',
                                     [$name, $phone, $address, $email, $order_date, $expected_delivery_date, $total_price, $isactive, $id_bill]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function billDetail($id_bill) {
        $bill = DB::select('select bill.*,customer_info.name AS name_customer, customer_info.address AS address_customer, customer_info.phone AS phone_customer, customer_info.email AS email_customer
         from bill inner join customer_info on customer_info.id_customer_info = bill.id_customer_info where id_bill = ?', [$id_bill]);
        // dd($bill);
        if ($bill != null) {
            return $bill[0];
        } else {
            return null;
        }
    }

    public static function changeIsActive($id_bill, $isactive)
    {
        try {
            DB::update('update bill set isactive = ? where id_bill = ?',
                                    [$isactive, $id_bill]);
            
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
