<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = product::orderBy('name','asc')->get();
        return response()->json([
            'status'=> true,
            'message'=> 'data ditemukan',
            'data'=> $data,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new product();
        $rules = [
            'name'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=> false,
                'message'=> 'gagal memasukkan data',
                'data'=> $validator->errors(),
            ],401);
        };
        //Jika tidak ada error maka akan menjalankan perintah ini
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return response()->json([
            'status'=> true,
            'message'=> 'berhasil memasukkan data',
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
