<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer_info extends Model
{
    use HasFactory;
    public static function getAllCustomer_info()
    {
        $Customer_info = DB::table('customer_info')
                    ->select('customer_info.*')
                    ->orderBy('customer_info.created_at', 'DESC')
                    ->paginate(10);

        return $Customer_info;

        // try {
        //     $Customer_info = DB::select('SELECT *
        //     FROM customer_info
        //     ORDER BY customer_info.created_at DESC');
        //     return $Customer_info; 
        // } catch(\Throwable $th){
        //     return null;
        //  }

    }
    public static function createCustomer_info($username, $password, $name, $sex,$address, $phone, $email, $isactive)
    { 
        $Customer_info = DB::insert('insert into customer_info (username, password, name, sex, address, phone, email, isactive)
         values (?,?,?,?,?,?,?,?)', [$username, $password, $name, $sex, $address, $phone, $email, $isactive]);
        return $Customer_info;
    }

    public static function updateCustomer_info($id_customer_info,$username, $password, $name, $sex, $address, $phone, $email, $isactive)
    {
        try {
            $Customer_info = DB::table('customer_info')->where('id_customer_info', $id_customer_info)->first();
            if ($Customer_info == null) {
                return false;
            }
            DB::update('update customer_info set username = ?, password = ?, name = ?, sex = ?, address = ?, phone = ?, email = ?, isactive = ? where id_customer_info = ?',
                                 [$username, $password, $name, $sex, $address, $phone, $email, $isactive, $id_customer_info]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function Customer_infoDetail($id_customer_info) {
        $Customer_info = DB::select('SELECT * FROM customer_info WHERE id_customer_info = ? ', [$id_customer_info]);
        // dd($Customer_info);
        return $Customer_info;
    }

    public static function changeIsActive($id_Customer_info, $isactive)
    {
        try {
            DB::update('update customer_info set isactive = ? where id_customer_info = ?',
                                    [$isactive, $id_Customer_info]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    
}
