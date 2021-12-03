<?php
   
namespace App\Models; 
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'customer_info';
    protected $fillable = [
        'username', 'password'
    ];
    public $timestamps = false;
    const UPDATED_AT = null;
    protected $hidden = ['created_at', 'updated_at'];
}