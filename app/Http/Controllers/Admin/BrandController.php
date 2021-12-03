<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandSubmitRequest;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBrand = Brand::getAllBrand();

        return view('Admin.brand.brand', compact(
            'allBrand'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $Brand = Brand::getAllBrand();

    //     return $Brand;
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function brandForm(Request $request)
    {
        $id_brand = $request->id_brand;
        
        if (isset($id_brand)) {
            $brand = Brand::brandDetail($id_brand)[0];
    
            return view('Admin.brand.brand_form', compact('brand'));
        } else {
            return view('Admin.brand.brand_form');
        }
    }
    
    public function brandSubmit(BrandSubmitRequest $request)
    {
        $id_brand = $request->id_brand;
        $name = $request->brand;
        $description = $request->description;

        if (isset($id_brand)) {
            // Process Update Record
            $brand = Brand::updateBrand($id_brand, $name, $description);

            return $brand == true ? redirect()->route('admin.brand.index')->with('msgSuc', 'Lưu bản ghi thành công')
                            : redirect()->back()->with('msgErr', 'Lưu bản ghi không thành công!')->withInput();
        } else {
            $brand = Brand::createBrand($name, $description, 0);
        
            if ($brand == null) {
                return redirect()->back()->with('msgErr', 'Lưu bản ghi không thành công!')->withInput();
            }
            
            return redirect()->route('admin.brand.index')->with('msgSuc', 'Lưu bản ghi thành công');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function changeIsActive(Request $request)
    {
        $id_brand = $request->id_brand;
        $isActive = $request->is_active;

        
        $updatBrand = Brand::changeIsActive($id_brand, $isActive);

        if ($updatBrand) {
            return redirect()->route('admin.brand.index')->with('msgSuc', 'Thay đổi trạng thái thành công!');
        } else {
            return redirect()->route('admin.brand.index')->with('msgErr', 'Thất bại!');
        }
    }
}
