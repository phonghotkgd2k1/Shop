<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillSubmitRequest;
use App\Models\Admin\Bill as AdminBill;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $Bill = AdminBill::getAllBill();

        return view('Admin.Bill.bill', compact(
            'Bill'
        ));
    }
    public function billDetail(Request $request)
    {
            $id_bill = $request->id_bill;
            $Bill = AdminBill::billDetail($id_bill);

            return view('admin.bill.bill_detail', compact('Bill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function billDetail(Request $request)
    // {
    //     $id_bill = $request->id_bill;

    //     $bill = AdminBill::billDetail($id_bill);

    //     return view('admin.bill.bill_detail', compact('bill'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Bill  $id
     * @return \Illuminate\Http\Response
     */
    public function billForm(Request $request)
    {
        $id_bill = $request->id_bill; 
        if (isset($id_bill) && $id_bill > 0) {
            $bill = AdminBill::billDetail($id_bill);
           if ($bill){
               $bill = $bill[0];
           }
            return view('Admin.bill.bill_form', compact('bill'));
        } else {
            return view('Admin.bill.bill_form');
        }
    }
    
    public function billSubmit(BillSubmitRequest $request)
    {
        
        $id_bill = $request ->id_bill;
        $name = $request->id_bill;
        $phone = $request->phone;
        $address = $request ->address;
        $email = $request->email;
        $order_date = $request->order_date;
        $expected_delivery_date = $request->expected_delivery_date;
        $total_price = $request->total_price;
        $isactive = $request->isactive == null ? 1 : 0;

        if (isset($id_bill)) {
            // dd($id_bill);
            $bill = AdminBill::updateBill($id_bill, $name, $phone, $address, $email, $order_date, $expected_delivery_date, $total_price, $isactive);
            // dd($bill);
            return $bill == true ? redirect()->route('admin.bill.index')->with('msgSuc', 'Lưu bản ghi thành công')
                            : redirect()->back()->with('msgErr', 'Lưu bản ghi không thành công!')->withInput();
        } else {
            $bill = AdminBill::createBill($name, $phone, $address, $email, $order_date, $expected_delivery_date, $total_price, $isactive);        
            if ($bill == null) {
                return redirect()->back()->with('msgErr', 'Lưu bản ghi không thành công!')->withInput();
            }
            
            return redirect()->route('admin.bill.index');
        }
        
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
    public function changeIsActive(Request $request)
    {
        $id_bill = $request->id_bill;
        $isActive = $request->is_active;

        
        $updateBill = AdminBill::changeIsActive($id_bill, $isActive);

        if ($updateBill) {
            return redirect()->route('admin.bill.index')->with('msgSuc', 'Thay đổi trạng thái hóa đơn thành công');
        } else {
            return redirect()->route('admin.bill.index')->with('msgErr', 'Thất bại!');
        }
    }
}
