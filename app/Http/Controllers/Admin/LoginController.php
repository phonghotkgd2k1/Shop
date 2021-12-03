<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\c;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('Admin.Auth.login',[
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $password = 'tienguyen';
        DB::insert('insert into admin (username, password) values (?, ?)', ['username', md5($password)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->input('username');
        $password = $request->input('pass');
        // dd(Hash::make('tiennguyen'));

        $admin = DB::select('select * from admin where isactive = ? AND username = ? AND password = ?', [0, $email, md5($password)]);
        
        if ($admin && count($admin) > 0) {
            $request->session()->put('username', $email);
            $request->session()->put('role', $admin[0]->role);
            $request->session()->put('name', $admin[0]->name);
            
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('msgErr' , 'Tài khoản không tồn tại hoặc bị khóa!');
        }
    }
    
    public function logout(Request $request){
        
        $request->session()->forget('username');
        $request->session()->forget('role');
        $request->session()->forget('name');
        // Auth::guard('admin')->logout();
        // Jedis, JWT

        return redirect()->route('admin.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $username = $request->session()->get('username');
        $passwordNew = 'null';
        $passwordOld = 'null';

        $admin = DB::select('select * from admin where isactive = ? AND username = ? AND password = ?', [0, $username, md5($passwordOld)]);

        DB::update('update admin set password = ? where username = ?', [md5($passwordNew), $username]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
    public function findAdmin($username){
        
    }
}
