<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Product;
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
        // $products = Product::all();
        $products = Product::with('category')->get();
        return response()->json($products);
        
        
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
        $validate= Validator::make($request->all(),[
        'name'=>           'required',
        'description'=>    'required',
        'price'=>          'required',
        'category_id'=>    'required'
        ]);
        if ($validate->passes()){
            $product= Product::create($request->all());
            return response()->json([
            'message'=> 'data berhasil disimpan',
            'data'=>$product
            ]);
        } else{
        return response()->json([
            'message'=> 'data gagal disimpan',
            'status'=>$validate->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(  $product )
    {
        // return $product;
        $products = Product::with('category')->where('id', $product)->first();
        return response()->json($products);
        // $data = Product::where('id', $product)->first();
        // if (!empty($data)){
        //     return $data;
        // }
        // return response()->json(['message'=> 'data tidak ditemukan'], 404);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
       $data = Product::where('id', $product)->first();
       if (!empty($data)){
        $validate= Validator::make($request->all(),[
            'name'=>           'required',
            'description'=>    'required',
            'price'=>          'required',
            'category_id'=>    'required'
        ]);
       
       if ($validate->passes()){
        $data->update($request->all());
        return response()->json([
        'message'=> 'data berhasil disimpan',
        'data'=>$data
        ]);
    } else{
    return response()->json([
        'message'=> 'data gagal disimpan',
        'status'=>$validate->errors()->all()
    ]);
}
    }
       return response()->json(['message'=> 'data tidak ditemukan'], 404);
      
        // $product->update($request->all());
        // return response()->json([
        //     'message'=> 'data berhasil di update',
        //     'data'=> $product
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $product)
    {
        $data = Product::where('id', $product)->first();
        if (empty($data)){
            return response()->json([
                'message' => 'Data tidak di temukan' ],404);
        }
        
        
    
       $data->delete();
       return response()->json([
           'message'=> 'data telah dihapus'
           ]);
    }
}
