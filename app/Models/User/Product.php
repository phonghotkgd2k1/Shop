<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    
    public static function getProductByBrandID($id_brand) {
        $product = DB::table('product')
                    ->where('id_brand', '=', $id_brand)
                    ->where('is_accessory', '=', 0) // 0 là sản phẩm bth
                    ->get();

        return $product;
    }
    
    public static function getAccessoryByBrandID($id_brand) {
        $accessory = DB::table('product')
                    ->where('id_brand', '=', $id_brand)
                    ->where('product.isactive', 0)
                    ->where('is_accessory', '=', 1) // 1 là sản phẩm bth
                    ->get();

        return $accessory;
    }
    
    public static function getProductByID($id_product) {
        $product = DB::table('product')//->select('product.*')
                    // ->leftJoin('product_stock', 'product_stock.id_product', '=', 'product.id_product')
                    ->where('product.id_product', '=', $id_product)
                    // ->whereRaw($id_color == null || $id_color == -99 ? '1=1' : "product_stock.id_color = $id_color")
                    // ->whereRaw($id_gb == null || $id_gb == -99 ? '1=1' : "product_stock.id_gb = $id_gb")
                    ->first();

        if ($product == null)
            abort(404);
        
        return $product;
    }

    public static function getImagesByIDProduct($id_product) {
        $images = DB::select('select * from images where id_product = ?', [$id_product]);
        // $images = DB::table('images')
        //             ->where('id_product', '=', $id_product)
        //             ->get();

        return $images;
    }

    public static function getProductStockByIDProduct($id_product) {
        $product_stock = DB::table('product_stock')
                   ->where('id_product', '=', $id_product)
                   ->orderBy('id_product', 'DESC')
                   ->where('quantity', '>', 0)
                   ->first();

        return $product_stock;
    }

    public static function getAllProductStockByIDProduct($id_product, $id_color, $id_gb) {
        $product_stock = DB::table('product_stock AS PS')
                    // ->select("C.name AS name_color", "gb.name AS name_gb", "PS.quantity", "C.id_color AS id_color", "gb.id_gb AS id_gb")
                    // ->join('color AS C', 'C.id_color', '=', 'PS.id_color')
                    // ->join('gb', 'gb.id_gb', '=', 'PS.id_gb')
                    ->where('id_product', '=', $id_product)
                    ->whereRaw($id_color == null || $id_color == -99 ? '1=1' : "PS.id_color = $id_color")
                    ->whereRaw($id_gb == null || $id_gb == -99 ? '1=1' : "PS.id_gb = $id_gb")
                //    ->orderBy('id_product', 'DESC')
                //    ->where('quantity', '>', 0)
                    ->get();

        return $product_stock;
    }

    public static function checkStockWithQty($id_product, $id_color, $id_gb, $qty) {
        $stock = DB::select('SELECT * FROM Product_Stock WHERE id_product = ? AND id_color = ? AND id_gb = ?',
                    [$id_product, $id_color, $id_gb]);

        if ($stock == null || $stock[0]->quantity == null) {
            return false;
        }

        if ($stock[0]->quantity == 0 || $stock[0]->quantity < $qty) {
            return false;
        }

        return true;
    }
}
