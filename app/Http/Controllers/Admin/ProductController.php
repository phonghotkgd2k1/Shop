<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSubmitRequest;
use App\Models\Admin\Brand;
// use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $product = Product::getAllProduct();

        return view('Admin.product.product', compact(
            'product'
        ));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productDetail(Request $request)
    {
        $id_Product = $request->id_product;

        $product = Product::productDetail($id_Product);

        return view('admin.product.product_detail', compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productForm(Request $request)
    {   
        $id_Product = $request->id_product;
        $brand = Brand::getAllBrand();
        if (isset($id_Product) && $id_Product >0) {
            $product = Product::productDetail($id_Product);
    
            return view('Admin.product.product_form', compact('product', 'brand'));
        } else {
            return view('Admin.product.product_form', compact('brand'));
        }
       
    }

    // public function ProductUpdate(Request $request)
    // {   
    //     $id_Product = $request -> id_product;
        
    //     $Product = Product::UpdateProduct($id_Product);

    //     return view('Admin.product.product_update',compact('Product'));
    // }

    public function productSubmit(ProductSubmitRequest $request)
    {
        $id_Product = $request->id_product;
        $name = $request->name;
        $images = $request->images;
        $brand = $request->brand;
        $price =  $request->price;
        $discount =  $request->discount;
        $quantity =  $request->quantity;
        $date_nhap = $request->date_nhap;
        $content = $request->content;
        $description = $request->description;
        $isactive = $request->isactive == null ? 1 : 0;
        
        
        if (isset($id_Product)  && $id_Product > 0) {
            $UpdateProduct = Product::updateProduct($id_Product,$name, $images, $brand, $price, $discount, $quantity,$date_nhap, $content, $description, $isactive);
            

            return $UpdateProduct == true ? redirect()->route('admin.product.index')->with('msgSuc', 'Cập nhật sản phẩm thành công')
                            : redirect()->back()->with('msgErr', 'Cập nhật sản phẩm thất bại!')->withInput();
        } else {
            $product = Product::createProduct($name, $images,$brand, $price, $discount, $quantity,$date_nhap, $content, $description, $isactive);
           
        
            if ($product == null) {
                return redirect()->back()->with('msgErr', 'Thêm sản phẩm thất bại!')->withInput();
            }
            
            return redirect()->route('admin.product.index')->with('msgSuc', 'Thêm sản phẩm thành công!');
        }
        
        
        //      if ($UpdateProduct) {
        //         return redirect()->route('product.index');
        //     } else {
        //         return redirect()->back()->withInput();
        //     }
        // } else {
        //     Product::createProduct($name, $images, $brand, $price, $discount, $quantity, $content, $description, $isactive);

        //     return redirect()->route('product.index');
        // }

        
        // $product = Product::createProduct($name, $images,$id_brand, $price, $discount, $quantity, $content, $description, 0);

        // return redirect()->route('admin.product.index');
        
        // $Product = Product::UpdateProduct($id_Product, $name, $images,$id_brand, $price, $discount, $quantity, $content, $description, 0);
        // if(isset($id_Product) && $id_Product >0)
        // return redirect() -> route('admin.product.index')->with('mgs', 'Cập nhật sản phẩm thành công!' )->withInput();
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function updateProductByID(Request $request)
    // {   dd(1);
    //     $id_Product = $request -> id_product;
        
    //     $Product = Product::UpdateProduct($id_Product);

    //     return view('Admin.product.product_update',compact('Product'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function changeIsActive(Request $request)
    {
        $idProduct = $request->id_product;
        $isActive = $request->is_active;


        $updateProduct = Product::changeIsActive($idProduct, $isActive);

        if ($updateProduct) {
            return redirect()->route('admin.product.index')->with('msgSuc', 'Mở sản phẩm thành công');
        } else {
            return redirect()->route('admin.product.index')->with('msgErr', 'Thất bại!');
        }
    }
}
