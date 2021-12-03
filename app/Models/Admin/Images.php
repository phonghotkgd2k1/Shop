<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Images extends Model
{
    use HasFactory;
    public static function getAllImages()
    {
        // dd(1);
    //     $Images = DB::table('images')
    //             ->where('isActive', 0)
    //             ->get();
    //             dd($Images);
    //     return $Images; 
   
    // $Images = DB::select('SELECT product.images, product.name, product.isactive
    //                         FROM images
    //                         WHERE images.isactive = ?', [0]);
    //                         // dd($Images);
    //         return($Images);
    //  }

    // getImageByIDProduct($id_product)
    // getAll()
    }
}
