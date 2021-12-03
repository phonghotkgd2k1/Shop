<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HotProduct extends Model
{
    use HasFactory;

    public static function getHotProduct() {
        // DB::connection()->enableQueryLog();
        $hotProduct = DB::table('hot_product AS HP')
                        ->leftJoin('product AS P', 'P.id_product', '=', 'HP.id_product')
                        // ->where('product.id_brand', '=', $id)
                        ->get();
        // dd(DB::getQueryLog());
        return $hotProduct;
    }
}
