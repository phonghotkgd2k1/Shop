<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HotPrd extends Model
{
    use HasFactory;
    public static function getAllHotPrd()
    {
        // dd(1);
        // $HotPrd = DB::table('hot_product') 
        //         ->where('isActive', 0)
        //         ->get();
        //         // dd($HotPrd);        
        // return $HotPrd; 

        // $HotPrd = DB::table('product')
        //             ->select('product.*', 'hot_product.id_hot_product', 'brand.name AS name_brand')
        //             ->selectRaw('CASE WHEN discount IS NOT NULL AND discount > 0 THEN price-price*(discount/100) ELSE price END AS newprice')
        //             ->join('brand', 'brand.id_brand', '=', 'product.id_brand', 'product', 'product.id_product', '=', 'hot_product.id_product')
        //             ->orderBy('hot_product.id_product', 'DESC')
        //             ->paginate(10);

        // return $HotPrd;

        // $HotPrd = DB::select('SELECT product.*images, product.*name, product.*description, product.*content, product.*quantity, product.*price, product.*isActive
        // FROM hot_product JOIN product 
        // ON hot_product.id_product = product.id_product iActive = ?', [0]);

        // Tránh SQLInjection sẽ dùng cú pháp ?
        try{
            $sql = DB::select('SELECT product.*, hot_product.id_hot_product
                            FROM hot_product
                            INNER JOIN product ON product.id_product = hot_product.id_product
                            ORDER BY hot_product.id_product DESC');
        return $sql;
        } catch (\Throwable $th) {
            return null;
        }
        
    }

    public static function createHotPrd($id_hot_product, $id_product, $isactive)
    {
        return DB::insert('insert into hot_product (id_hot_product, id_product, isactive) values (?, ?, ?)',
                                               [$id_hot_product, $id_product, $isactive]);
    }
    public static function updateHotPrd($id_HotPrd, $id_hot_product, $id_product, $isactive)
    {   
        try {
            $HotPrd = DB::table('hot_product')->where('id_hot_product', $id_HotPrd)->first();
            if ($HotPrd == null) {
                return false;
            }
            DB::update('update hot_product set id_hot_product = ?, id_product = ?, isactive = ? where id_hot_product = ?', [$id_hot_product, $id_product, $isactive,$id_HotPrd]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function HotPrdDetail($id_hot_product) {
        $HotPrd = DB::select('SELECT * FROM hot_product WHERE id_hot_product = ? AND isActive = ? ', [$id_hot_product, 0]);

        return $HotPrd;
    }
}