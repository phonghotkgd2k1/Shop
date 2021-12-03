<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartCustommer extends Model
{
    use HasFactory;
    public static function getAllCartCustommer()
    {
        $CartCustommer = DB::table('cart_custommer')
                ->where('isactive', 0)
                ->get();
        return $CartCustommer; 
    }
}
