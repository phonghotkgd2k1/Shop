<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public static function getAllProduct()
    {   
        $product = DB::table('product')
                    ->select('product.*', 'brand.name AS name_brand')
                    ->selectRaw('CASE WHEN discount IS NOT NULL AND discount > 0 THEN price-price*(discount/100) ELSE price END AS newprice')
                    ->join('brand', 'brand.id_brand', '=', 'product.id_brand')
                    ->orderBy('product.created_at', 'DESC')
                    ->paginate(10);

        return $product;
    }
        // try {
        //     $product =DB::select('SELECT *
        //                         FROM product 
        //                         INNER JOIN brand on brand.id_brand= product.id_brand
        //                       ORDER BY product.id_product DESC')
        //                       PAGINATE (10); 
        // return $product;
        // } catch (\Throwable $th) {
        //     return null;
        // }
        // try {
        //     $product =DB::select('SELECT  * FROM product 
        //                       ORDER BY product.id_product DESC');   
        // return $product;
        // } catch (\Throwable $th) {
        //     return null;
        // }
     
        // $product = DB::table('product')
        //         ->where('is_accessory', 0)
        //         ->get();
        // return $product;
        
    
    public static function createProduct($name, $images, $brand, $price, $discount, $quantity,$date_nhap, $content, $description, $isactive)
    {
        try {
            $idProduct = null;
            foreach ($images as $key => $value) {
                $fileName = Product::saveImages($value);
                if ($key == 0) {
                    $idProduct = DB::table('product')->insertGetId(
                        [
                            'name' => $name, 
                            'images' => $fileName,  
                            'id_brand' => $brand,  
                            'price' => $price,  
                            'discount' => $discount,  
                            'quantity' => $quantity,  
                            'date_nhap' =>$date_nhap,
                            'content' => $content,  
                            'description' => $description,  
                            'isactive' => $isactive 
                        ]
                        );
                } else {
                    DB::insert('insert into images (name, id_product) values (?, ?)', [$fileName, $idProduct]);
                }
            }
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static $acceptFileExtension = ['image/jpg', 'image/jpeg', 'image/png'];

    public static function saveImages($fileImages)
    {
        if (!in_array($fileImages->getClientMimeType(), Product::$acceptFileExtension)) {
            throw new Exception('Định dạng file tải lên không hợp lệ!');
        } else {
            $now = Carbon::now(); //Có 1 hàm xử lý thời gian
            $imageName = $now->timestamp.$now->milli.$fileImages->getClientOriginalName();

            $fileImages->move('Images', $imageName);

            return $imageName;
        }
    }

    public static function updateProduct($id_Product,$name, $images, $brand, $price, $discount, $quantity,$date_nhap, $content, $description, $isactive)
    {    
        try {
            $id_Product = null;
            foreach ($images as $key => $value) {
                $fileName = Product::updateImages($value);
                // dd($fileName);
                if ($key == 0) {
                    $id_Product = DB::table('product')->where('id_product', $id_Product)->updateGetId(
                        [ 
                            
                            'name' => $name, 
                            'images' => $fileName,  
                            'id_brand' => $brand,  
                            'price' => $price,  
                            'discount' => $discount,  
                            'quantity' => $quantity,  
                            'date_nhap' =>$date_nhap,
                            'content' => $content,  
                            'description' => $description,  
                            'isactive' => $isactive 
                        ]
                        );
                } else {
                    DB::update(' update (name, id_product) values (?, ?)', [$fileName, $id_Product]);
                }
            }
            dd($id_Product);

        } catch (\Throwable $th) {
           return false;
        }
        // getMessage Exception
    }

   
    public static function updateImages($fileImages)
    {
        if (!in_array($fileImages->getClientMimeType(), Product::$acceptFileExtension)) {
            throw new Exception('Định dạng file tải lên không hợp lệ!');
        } else {
            $now = Carbon::now(); //Có 1 hàm xử lý thời gian
            $imageName = $now->timestamp.$now->milli.$fileImages->getClientOriginalName();

            $fileImages->move('Images', $imageName);

            return $imageName;
        }
    }

    public static function productDetail($id_Product) 
    {   
        $product = DB::select('select product.*, brand.name AS brand_name, brand.isactive AS brand_isactive 
                                    from product inner join brand on brand.id_brand = product.id_brand 
                                    where id_product = ?', [$id_Product]);
                                    

        if ($product != null) {
            return $product[0];
        } else {
            return null;
        }
        // $product = DB::select('SELECT * FROM product WHERE id_product = ? ', [$id_Product]);
        // return $product;
    }

    public static function changeIsActive($id_Product, $isactive)
    {
        try {
            DB::update('update product set isactive = ? where id_product = ?',
                                    [$isactive, $id_Product]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
