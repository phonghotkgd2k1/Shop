<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feedback extends Model
{
    use HasFactory;
    public static function getAllFeedback()
    {
        $Feedback = DB::table('feedback')
                ->where('isActive', 0)
                ->get();
        return $Feedback; 
    }
    public static function createFeedback($title, $send_date, $name, $email, $id_customer_info, $content, $isActive)
    {
        return DB::insert('insert into Feedback (title, send_date, name, email, id_customer_info, content, isActive) 
        values (?, ?, ?,?, ?, ?, ?)', [$title, $send_date, $name, $email, $id_customer_info, $content, $isActive]);
    }
}