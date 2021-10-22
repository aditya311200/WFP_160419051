<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryBuilder = DB::table('suppliers')->get();
        return view('supplier.index', ['data'=>$queryBuilder]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.createform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Supplier();

        //$data->[nama kolom pada db] = $request->get('[name dari input text]')
        $data->nama = $request->get('nmSupplier');
        $data->save();

        return redirect()->route('suppliers.index')->with('status', 'Data Supplier berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }

    public function showInfo() 
    {
        return response()->json(array(
            'msg'=>'ini Function ShowInfo di SupplierController',
            'status'=>'OKE'
        ), 200);
    }

    public function showAjax(Request $request) 
    {
        $id = ($request->get('id'));
        
        $data = Supplier::find($id);

        $dataProduk = $data->products;
        
        return response()->json(array(
            'message'=> view('supplier.showmodal', compact('data', 'dataProduk'))->render()
        ), 200);
    }
}
