<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name','email','password','level','isactive)'];

    protected $hidden = ['password'];

    public static function getAlladminDetails()
    {
        try {
            $adminDetails = DB::table('admin')
                ->where('isActive', 1)
                ->get();
                
        return $adminDetails;
        }
         catch (\Throwable $th){
             return null;
         }
    }
    //lấy thông tin admin từ db dựa trên username có sẵn
    public static function findAdmin($username){
        $admin = DB::table('admin')->where('username',$username)->get();
        return $admin;

    }
}
