<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer_infoSubmitRequest;
use App\Models\User\Customer_info;
use App\Models\User\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Account extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.Auth.account', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    public function createForm(Request $request)
    {
        $id_Customer_info = $request->id_customer_info;
        
        if (isset($id_Customer_info)) {
            $Customer_info = Customer_info::Customer_infoDetail($id_Customer_info)[0];
        //   
            return view('User.layout.createAccount', compact('Customer_info'));
        } else {
            return view('User.layout.createAccount');        
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function createSubmit(Customer_infoSubmitRequest $request)
    {
        $id_Customer_info = $request->id_customer_info;
        $username = $request->username;
        $password = $request->password;
        $sex = $request->sex;
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        $isactive = $request->isactive == null ? 1 : 0;

        if(isset($id_Customer_info) && $id_Customer_info > 0) {
            $Customer_info = Customer_info::updateCustomer_info($id_Customer_info,$username, $password, $name, $address, $phone, $email, $isactive);
            
            return $Customer_info == true ? redirect()-> route('login.index')->with('msgSuc', 'Cập nhật thông tin thành công')
                                   : redirect()-> back()->with('msgErr', 'Cập nhật thông tin không thất bại!')->withInput();
        }else {
            $Customer_info = Customer_info::createCustomer_info($username, $password, $sex, $name, $address, $phone, $email, $isactive);
            if ($Customer_info == null) {
                return redirect()->back()->with('msgErr', 'Tạo tài khoản tin thất bại!')->withInput();
            }
            
            return redirect()->route('account.login')->with('msgSuc', 'Tạo tài khoản thành công');
        }
    }

    public function store(Request $request)
    {
        $email = $request->input('username');
        $password = $request->input('pass');
        
        $user = DB::select('select * from customer_info where isactive = ? AND username = ? AND password = ?', [0, $email, md5($password)]);
        
        if ($user && count($user) > 0) {
            $request->session()->put('username', $email);
            $request->session()->put('userId', $user[0]->id_customer_info);
            // $request->session()->put('role', $user[0]->role);
            $request->session()->put('name', $user[0]->name);//get name 

            $cartCustomerInfor = $request->session()->get('cartCustomerInfor');
            // dd($cartCustomerInfor);
            // $customerInfo = Customer_info::CustomerDetailByUserName($email)[0];

            // if ($cartCustomerInfor && count($cartCustomerInfor) > 0) {
            //     $id = DB::table('customer_info')->insertGetId(
            //         [
                       
            //             'id_customer_info' => 2001,
            //             'isactive' => 0,z
            //             'username' => $email,
            //             'password' => $password,
            //             'sex' => 0,
            //         ]
            //     );
            if($cartCustomerInfor != null){
                foreach ($cartCustomerInfor as $value) {
                    // Luu data vao bang cart customer
                    $idProduct = $value['id_product'];
                    $quantity = $value['quantity'];   
                    $userId = $request->session()->get('userId');
                    $product = Product::getProductByID($idProduct);
                    try {
                        DB::insert('insert into cart_customer (id_customer_info, id_product, quantity) values (?, ?, ?)', [ $userId, $product->id_product, $quantity]); 
    
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                    // DB::insert('insert into cart_customer (id_customer_info, id_product, quantity)values (?, ?, ?)', ['id_Customer_info' =>1006, $product->id_product, $quantity]);
    
                }
            }
            return redirect()->route('product.index')->with('msgSuc', 'Bạn đã nhập thành công!');
        } else {
            return redirect()->back()->with('msgErr' , 'Tài khoản không tồn tại hoặc bị khóa!');
        }
    }

    public function logout(Request $request){
        
        $request->session()->forget('username');
        // $request->session()->forget('role');
        $request->session()->forget('name');
        // Auth::guard('admin')->logout();
        // Jedis, JWT

        return redirect()->route('account.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
