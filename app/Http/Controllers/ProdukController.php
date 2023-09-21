<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produk = produk::all();
        return response()->json($produk);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nama'=>'required',
            'content'=>'required',
        ]);
        $produk = produk::create($request->all());
        return response()->json($produk);
    }
    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
        return response()->json($produk);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'nama'=>'required',
            'content'=>'required',           
        ]);

        $produk = produk::find($id);
        $produk->nama = $request->nama;
        $produk->content = $request->content;       

        //response api update
        if ($produk->save()){
            return response()->json(['msg'=>'Succesfully updated produk','data' => $produk]);
        } else {
            return response()->json('Failed to update data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        //
        $produk->delete();
        return response()->json([
            'data'=>'data berhasil dihapus'
        ]);
    }
}
