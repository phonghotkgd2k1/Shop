<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name','email','password','isactive)'];

    protected $hidden = ['password'];

    public static function getAllCustomerDetails()
    {
        try {
            $CustomerDetails = DB::table('customer_info')
                ->where('isActive', 0)
                ->get();
                
        return $CustomerDetails;
        }
         catch (\Throwable $th){
             return null;
         }
    }
}
