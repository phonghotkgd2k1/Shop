<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;
    public static function getBrand() {
        $Brand = DB::table('Brand')->where('isactive', 0)->get();

        return $Brand;
    }
}
