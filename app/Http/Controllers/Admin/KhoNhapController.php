<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KhoNhap;
use Illuminate\Http\Request;

class KhoNhapController extends Controller
{
    public function index()
    {
        $khonhap = KhoNhap::getALlProduct();
        
        return view('Admin.kho.kho', compact(
            'khonhap'
        ));
    }
}
