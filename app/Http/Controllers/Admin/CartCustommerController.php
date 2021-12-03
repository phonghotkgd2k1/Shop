<?php

namespace App\Http\Controllers;

use App\Models\CartCustommer;
use Illuminate\Http\Request;

class CartCustommerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $CartCustommer = CartCustommer::getAllCartCustommer();
    
            return view('Admin.CartCustommer.cartCustommer', compact(
                'CartCustommer'
            ));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * @param  \App\Models\CartCustommer  $cartCustommer
     * @return \Illuminate\Http\Response
     */
    public function show(CartCustommer $cartCustommer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartCustommer  $cartCustommer
     * @return \Illuminate\Http\Response
     */
    public function edit(CartCustommer $cartCustommer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartCustommer  $cartCustommer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartCustommer $cartCustommer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartCustommer  $cartCustommer
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartCustommer $cartCustommer)
    {
        //
    }
}
