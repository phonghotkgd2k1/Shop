<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NewPrd extends Model
{
    use HasFactory;
    public static function getAllNewPrd()
    {
        $NewPrd = DB::table('new')
                ->where('isActive', 0)
                ->get();
        return $NewPrd; 
    }
}
