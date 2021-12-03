<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;
    // protected $table = 'brand';
    // protected $primaryKey = 'id_brand';
    // protected $fillable = [
    //     "name",
    //     "description"
    // ];

    public static function getAllBrand()
    {
        // $Brand = DB::table('Brand')
        // ->where('isActive', 0)
        // ->get();
        // dd($Brand);

        // return $Brand;
        try {
            $Brand = DB::select('SELECT *
                                    FROM brand
                                    ORDER BY brand.created_at DESC');
                                    // dd($Brand);
            return $Brand;   
        } catch (\Throwable $th) {
            // dd($th);
            return null;
        }                
    }
    
    // public static function getAllBrand()
    // {
    //     $id_brand = DB::table('id_brand')
    //     ->get();
    //     return $id_brand;
    // }

    
    // DB::insert("INSERT into admin (username,password,name,images,address,isactive,role) values (?,?,?,?,?,?,1)", [
    //     $this->username,
    //     $this->password,
    //     $this->name_admin,
    //     $this->anh_admin,
    //     $this->address_admin,
    //     $this->trang_thai,
    // ]);
    public static function createBrand($name, $description, $isactive)
    {
        return DB::insert('insert into brand (name, description, isactive) 
                        values (?, ?, ?)', [$name, $description, $isactive]);
    }

    public static function updateBrand($id_brand, $name, $description)
    {
        // $brand = Brand::find($id_brand);
        // $brand->name = $name;
        // $brand->description = $description;
        // $brand->save();
        // return true;

        try {
            $brand = DB::table('brand')->where('id_brand', $id_brand)->first();
            if ($brand == null) {
                return false;
            }
            DB::update('update brand set name = ?, description = ? where id_brand = ?', [$name, $description, $id_brand]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function brandDetail($id_brand) {
        $brand = DB::select('SELECT * FROM brand WHERE id_brand = ? LIMIT 1', [$id_brand]);

        return $brand;
    }

    public static function changeIsActive($id_brand, $isactive)
    {
        try {
            DB::update('update brand set isactive = ? where id_brand = ?',
                                    [$isactive, $id_brand]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
