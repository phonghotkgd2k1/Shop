<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotPrdSubmitRequest;
use App\Models\Admin\HotPrd;
use App\Models\User\HotProduct;
use Illuminate\Http\Request;

class HotPrdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(1);
        $HotPrd = HotPrd::getAllHotPrd();

        return view('Admin.HotPrd.HotPrd', compact( 
            'HotPrd'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $hot_product = $request->input('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\HotPrd  $HotPrd
     * @return \Illuminate\Http\Response
     */
    public function HotPrdForm(Request $request)
    {   
        $id_HotPrd = $request->id_hot_product;
        if (isset($id_HotPrd)) {
            $HotPrd = HotPrd::HotPrdDetail($id_HotPrd);

            if ($HotPrd !== null && count($HotPrd) > 0) {
                $HotPrd = $HotPrd[0];
                return view('Admin.HotPrd.HotPrd_form', compact('HotPrd'));
            } else {
                abort(404);
            }
        } else {
            return view('Admin.HotPrd.HotPrd_form');
        }
        
    }

    public function HotPrdSubmit(HotPrdSubmitRequest $request)
    {
        $id_HotPrd = $request -> id_hot_product;
        $id_hot_product = $request->id_hot_product;
        $id_product =$request -> id_product;
        $isactive =$request->isactive ==null ? 1 : 0;
        if (isset($id_HotPrd) && $id_HotPrd >0) {
            // Process Update Record
            $HotPrd = HotPrd::updateHotPrd($id_HotPrd, $id_hot_product, $id_product, $isactive);
    
            return $HotPrd == true ? redirect()->route('admin.hot_product.index')->with('msgSuc', 'Cập nhật thành công')
                            : redirect()->back()->with('msgErr', 'Cập nhật không thành công!')->withInput();
        } else {
            $HotPrd = HotPrd::createHotPrd($id_hot_product,$id_product, 0);        
            if ($HotPrd == null) {
                return redirect()->back()->with('msgErr', 'Cập nhật không thành công!')->withInput();
            }
            
            return redirect()->route('admin.hot_product.index');
        }
        // $HotPrd = HotPrd::createHotPrd($id_hot_product,$id_product, 0);

        // return redirect()->route('admin.hot_product.index');
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function changeIsActive(Request $request)
    // {
    //     $id_HotPrd = $request->id_hot_product;
    //     $isActive = $request->is_active;

        
    //     $updateHotPrd = Product::changeIsActive($id_HotPrd, $isActive);

    //     if ($updateHotPrd) {
    //         return redirect()->route('admin.hot_product.index')->with('msgSuc', 'Mở sản phẩm thành công');
    //     } else {
    //         return redirect()->route('admin.hot_product.index')->with('msgErr', 'Thất bại!');
    //     }
    // }
}
