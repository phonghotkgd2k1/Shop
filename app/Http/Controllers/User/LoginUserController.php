<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginUserController extends Controller
{
    public function showLoginForm()
    {
        return view('user.layout.login',[
            'title' => 'Đăng nhập khách hàng'
        ]);
    }
    public function create()
    {
        // DB::insert('insert into customer_info (username, password) values (?, ?)', ['username', md5($password)]);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeuser(Request $request)
    {
        // $email = $request->input('username');
        // $password = $request->input('pass');
       

        // $customer_info = DB::select('select * from customer_info where isactive = ? AND username = ? AND password = ?', [0, $email, md5($password)]);
        
        // if ($customer_info && count($customer_info) > 0) {
        //     $request->session()->put('username', $email);
           
        //     $request->session()->put('name', $customer_info[0]->name);
            
        //     return redirect()->route('user.index');
        // } else {
        //     return redirect()->back()->with('msgErr' , 'Tài khoản không tồn tại hoặc bị khóa!');
        // }
    }
    public function logout(Request $request){
        
        $request->session()->forget('username');
       
        $request->session()->forget('name');
        
        return redirect()->route('user.login');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // $username = $request->session()->get('username');
        // $passwordNew = 'null';
        // $passwordOld = 'null';

        // $admin = DB::select('select * from customer_info where isactive = ? AND username = ? AND password = ?', [0, $username, md5($passwordOld)]);

        // DB::update('update customer_info set password = ? where username = ?', [md5($passwordNew), $username]);
    }

}
