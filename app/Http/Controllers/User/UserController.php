<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Request;
use App\Models\UserLogin;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class UserController extends Controller
{
public function index(){
   return view('user.home');
}
}