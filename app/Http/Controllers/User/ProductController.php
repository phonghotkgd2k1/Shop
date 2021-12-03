<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Brand;
use App\Models\User\HotProduct;
use App\Models\User\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function index() {
        $arrPrd = [];
        $arrHotPrd = [];
        $arrAccessories=[];
        //id_brand hiên tại: 1 2 3 9
        $brand = Brand::getBrand();
        // $hot_productxiaomi = HotProduct::getHotProduct($brand[0]->id_brand);

        foreach ($brand as $key => $item) {
            $idBrand = $item->id_brand;
            $product = Product::getProductByBrandID($idBrand);
            array_push($arrPrd, [$idBrand, $product]);
        }

        foreach ($brand as $key => $item) {
            $idBrand = $item->id_brand;
            $hot_accessories = Product::getAccessoryByBrandID($idBrand);

            if ($hot_accessories != null && count($hot_accessories) > 0) {
                array_push($arrAccessories, [[$idBrand, $item->name], $hot_accessories]);
            }
        }

        $hotPrd = HotProduct::getHotProduct();
        // foreach ($brand as $key => $item) {
            // array_push($arrHotPrd, $prd);
        // }

        // return $arrHotPrd;


        // $prd = Product::getPrd();

        // [{prd1_brand1}, {prd2_brand2}, {prd3_brand1}]
        // foreach (prd as item) {
        //     if (prd1->id_brand == 1)
                    // console
        // }
        //Cái getHotProduct nó đag là get All => nhưng vì giao diện yc là load theo brand => truyền brand khi load hotprd
        //SELECT * FROM hot_product HP JOIN product P ON P.id_product = HP.id_product WHERE P.id_brand = $id_brand
        //Tạo arr mới và map vào như arrPrd
        
        return view('User.default', compact(
            'arrPrd',
            'hotPrd',
            'brand',
            'arrAccessories'
        ));
    }

    // Viết fuction mới tương tự getProductStock (funcitonA)
    // Quy trình xử lý nut mua hàng
    // Param $productDetail sẽ trả về thêm số tồn trong bảng product stock
    // VD chỉ truyền vào màu sắc thì khi call viewDetail sẽ chỉ truyền sang màu sắc 
    // Khi mà người chọn gb thì gọi lại funcitonA 
    
    // public function getAddCart(Request $request) {
    //     $id_product = $request->id_product;
    //     $add_cart =Product::getAddCartByIDProduct($id_product);
       
    // }

    public function viewDetail(Request $request) {
        // dd($request->session()->get("cartCustomerInfor"));
        $id_product = $request->id_product;
        $id_color = $request->id_color;
        $id_gb = $request->id_gb;

        $productDetail = Product::getProductByID($id_product);

        //Tạo model Image (nếu chưa có)
        //Tạo function getImagesByIDProduct($id_product)

        $images = DB::table('images')
                     ->where('id_product', '=', $id_product)
                     ->get();
        // $images = Product::getImagesByIDProduct($id_product);


        // Lấy ra màu và tồn kho
        // Select product_stock theo id_product thì mình sẽ group theo màu và sum quantity
        // Sau khi SUM mình sẽ có màu nào còn tồn kho để check ở view 

        // Lấy ra màu và tồn kho
        // Select product_stock theo id_product thì mình sẽ group theo gb và sum quantity
        // Sau khi SUM mình sẽ có gb nào còn tồn kho để check ở view 
        // nếu như mà truyền màu thì SUM phải kèm if màu 
        // id_gb, SUM(quantity) // nếu có màu thì
        // join gb ON gb.id_gb = product_stock.id_gb
        // GROUP BY id_gb

        $product_stock = Product::getAllProductStockByIDProduct($id_product, $id_color, $id_gb);
        
        
        $color = [];
        $gb = [];
        foreach ($product_stock as $key => $value) {
            array_push($color, $value->id_color);
            array_push($gb, $value->id_gb);
        }
        $color = array_unique($color);
        $gb = array_values(array_unique($gb));

        $get_color = DB::select('SELECT SUM(quantity) AS quantity, id_color
                                    ,(SELECT name FROM color WHERE id_color = PS.id_color) AS name
                                    From product_stock AS PS
                                    Where id_product = ? 
                                    GROUP BY id_color', [$id_product]);

        if ($id_color != null) {
            $getGB = DB::select("SELECT SUM(CASE WHEN id_color = ? THEN quantity ELSE 0 END) AS quantity
                                        ,id_gb
                                        ,(SELECT name FROM gb WHERE id_gb = PS.id_gb) AS name
                                        From product_stock AS PS
                                        Where id_product = ? 
                                        GROUP BY id_gb", [$id_color, $id_product]);
        } else {
            $getGB = DB::select("SELECT SUM(quantity) AS quantity
                                        ,id_gb
                                        ,(SELECT name FROM gb WHERE id_gb = PS.id_gb) AS name
                                        From product_stock AS PS
                                        Where id_product = ? 
                                        GROUP BY id_gb", [$id_product]);
        }
        
        $arrWhere = [$id_product];
        $sql = "select SUM(quantity) quantity from product_stock where id_product = ? ";
        if ($id_color) {
            $sql .= " AND id_color = ? ";
            array_push($arrWhere, $id_color);
            if ($id_gb) {
                $sql .= " AND id_gb = ? ";
                array_push($arrWhere, $id_gb);
            }
        }

        $stock = DB::select($sql." GROUP BY id_product LIMIT 1", [...$arrWhere]);
        if ($stock == null || $stock[0]->quantity == 0) {
            // error
            // success
            // warning
            // information
            // Toastr::error('Sản phẩm không còn tồn kho!', '');

            $request->session()->flash('msgErr', 'Sản phẩm không còn tồn kho!');
            return view('User.view_detail', compact(
                'productDetail',
                'images',
                'get_color',
                'getGB'
            ));
        }

        return view('User.view_detail', compact(
            'productDetail',
            'images',
            'get_color',
            'getGB'
        ));
    }

    // Tạo route mới
    // Tạo function cho controller
    // Check còn tồn kho hay không 
    // Lưu data giỏ hàng // storage, session
    //{id_product}/{id_color?}/{id_gb?}
    public function addcart(Request $request){
        $id_product = $request->id_product;
        $id_color = $request->id_color;
        $id_gb = $request->id_gb;
        $qty = $request->qty;

        if ($id_color == null || $id_gb == null) {
            return redirect()->route('product.viewDetailName', ['id_product' => $id_product])
                            ->with('msgErr', 'Vui lòng chọn phiên bản!');
        }

        // Check còn tồn kho hay không
        $productDetail = Product::getProductByID($id_product);
        
        $arrCart = [];
        if ($request->session()->has('cartCustomerInfor')) {
            $arrCart = $request->session()->get('cartCustomerInfor');
        }
        
        if ($productDetail->quantity == 0) {
            return redirect()->route('product.viewDetailName', ['id_product' => $id_product])
                            ->with('msgErr', 'Sản phẩm đã hết tồn kho!');
        }

        $isExists = false;
        foreach ($arrCart as $key => $item) {
            // dd($item["id_product"]);
            if ($item["id_product"] == $productDetail->id_product) {
                $isStock = Product::checkStockWithQty($id_product, $id_color, $id_gb, $item["quantity"]+$qty);
                if ($isStock) {
                    $arrCart[$key] = ['model' => $productDetail
                                        ,'id_product' => $id_product
                                        ,'id_color' => $id_color
                                        ,'id_gb' => $id_gb
                                        ,'quantity' => $item["quantity"]+$qty
                                    ];
                } else {
                    return redirect()->route('product.viewDetailName', ['id_product' => $id_product])
                                    ->with('msgErr', 'Sản phẩm hết tồn kho!');
                }
                $isExists = true;
                break;
            }
        }

        if (!$isExists) {
            array_push($arrCart, ['model' => $productDetail, 'id_product' => $id_product, 'id_color' => $id_color, 'id_gb' => $id_gb, 'quantity' => $qty]);
        }

        $request->session()->put("cartCustomerInfor", $arrCart);

        return redirect()->route('product.viewDetailName', ['id_product' => $id_product])
                            ->with('msgSuc', 'Thêm sản phẩm thành công');
    }

    public function checkStockWithQty(Request $request){
        $id_product = $request->id_product;
        $id_color = $request->id_color;
        $id_gb = $request->id_gb;
        $qty = $request->qtyInput;

        return Product::checkStockWithQty($id_product, $id_color, $id_gb, $qty);
    }
}
