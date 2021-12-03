<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\KhoXuat;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /* cái này khi nào login được thì mở ra
    // public function __construct()
    // {
    //     $this->middleware('auth.admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $khoxuat = DB::table('khoxuat')
        // ->select(DB::raw('SUM(quantity) as tongxuat'), DB::raw('month(date_xuat) as thangxuat'))
        //         ->groupBy('thangxuat')

        // ->paginate(10);
        //kho nhập
        $nthang1 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 1)->paginate(10);
        $nthang2 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 2)->paginate(10);
        $nthang3 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 3)->paginate(10);
        $nthang4 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 4)->paginate(10);
        $nthang5 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 5)->paginate(10);
        $nthang6 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 6)->paginate(10);
        $nthang7 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 7)->paginate(10);
        $nthang8 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 8)->paginate(10);
        $nthang9 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 9)->paginate(10);
        $nthang10 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 10)->paginate(10);
        $nthang11 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 11)->paginate(10);
        $nthang12 = DB::table('product')
        ->select(DB::raw('SUM(quantity) as tongnhap'))-> where(DB::raw('month(date_nhap)'), 12)->paginate(10);

        $nthang1[0] = $nthang1[0] == null ? 0 : $nthang1[0]->tongnhap;
        $nthang2[0] = $nthang2[0] == null ? 0 : $nthang2[0]->tongnhap;
        $nthang3[0] = $nthang3[0] == null ? 0 : $nthang3[0]->tongnhap;
        $nthang4[0] = $nthang4[0] == null ? 0 : $nthang4[0]->tongnhap;
        $nthang5[0] = $nthang5[0] == null ? 0 : $nthang5[0]->tongnhap;
        $nthang6[0] = $nthang6[0] == null ? 0 : $nthang6[0]->tongnhap;
        $nthang7[0] = $nthang7[0] == null ? 0 : $nthang7[0]->tongnhap;
        $nthang8[0] = $nthang8[0] == null ? 0 : $nthang8[0]->tongnhap;
        $nthang9[0] = $nthang9[0] == null ? 0 : $nthang9[0]->tongnhap;
        $nthang10[0] = $nthang10[0] == null ? 0 : $nthang10[0]->tongnhap;
        $nthang11[0] = $nthang11[0] == null ? 0 : $nthang11[0]->tongnhap;
        $nthang12[0] = $nthang12[0] == null ? 0 : $nthang12[0]->tongnhap;
        //kho xuất
        $thang1 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 1)->paginate(10);
        $thang2 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 2)->paginate(10);
        $thang3 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 3)->paginate(10);
        $thang4 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 4)->paginate(10);
        $thang5 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 5)->paginate(10);
        $thang6 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 6)->paginate(10);
        $thang7 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 7)->paginate(10);
        $thang8 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 8)->paginate(10);
        $thang9 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 9)->paginate(10);
        $thang10 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 10)->paginate(10);
        $thang11 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 11)->paginate(10);
        $thang12 = DB::table('khoxuat')
        ->select(DB::raw('SUM(quantity) as tongxuat'))-> where(DB::raw('month(date_xuat)'), 12)->paginate(10);

        $thang1[0] = $thang1[0] == null ? 0 : $thang1[0]->tongxuat;
        $thang2[0] = $thang2[0] == null ? 0 : $thang2[0]->tongxuat;
        $thang3[0] = $thang3[0] == null ? 0 : $thang3[0]->tongxuat;
        $thang4[0] = $thang4[0] == null ? 0 : $thang4[0]->tongxuat;
        $thang5[0] = $thang5[0] == null ? 0 : $thang5[0]->tongxuat;
        $thang6[0] = $thang6[0] == null ? 0 : $thang6[0]->tongxuat;
        $thang7[0] = $thang7[0] == null ? 0 : $thang7[0]->tongxuat;
        $thang8[0] = $thang8[0] == null ? 0 : $thang8[0]->tongxuat;
        $thang9[0] = $thang9[0] == null ? 0 : $thang9[0]->tongxuat;
        $thang10[0] = $thang10[0] == null ? 0 : $thang10[0]->tongxuat;
        $thang11[0] = $thang11[0] == null ? 0 : $thang11[0]->tongxuat;
        $thang12[0] = $thang12[0] == null ? 0 : $thang12[0]->tongxuat;

// dd($thang9[0]->tongxuat);
        return view('Admin.dashboard', compact(
            'nthang1','nthang2','nthang3','nthang4','nthang5','nthang6','nthang7','nthang8','nthang9','nthang10','nthang11','nthang12','thang1','thang2','thang3','thang4','thang5','thang6','thang7','thang8','thang9','thang10','thang11','thang12',
        ));
    }
    
    // public function index()
    // {
    //     return view('Admin.dashboard');
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
