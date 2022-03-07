<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartCustomer extends Model
{
    use HasFactory;
    public static function CartCustomer($id_customer_info)
    {
        $cartCustomer = DB::table('cart_customer')
                    ->select('cart_customer.*')
                    ->join('product', 'product.id_product', '=', 'cart_customer.id_product')
                    ->where('cart_customer.id_product', '=', $id_customer_info)
                    
                    ->first();

        if ($cartCustomer == null)
            abort(404);
        return $cartCustomer;

    }

    public static function  saveCartByID($id_customer_info, $id_product, $quantity, $isactive)
    {
        try{
            $id_customer_info = null;
            
        $id_customer_info = DB::table('cart_customer')->insertGetId(
            [ 
              'id_customer_info' => $id_customer_info,
              'id_product' => $id_product,
              'quantity' => $quantity,
              'isactive' => $isactive
            ]
            );
            dd($id_customer_info);
            return true;
        } catch(\Throwable $th){
            return false;
        }
    }
}
