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
        // $queryBuilder = DB::table('suppliers')->get();

        // $queryModel = Supplier::all();

        // yang isi deleted_atnya ttp muncul
        $queryModel = Supplier::withTrashed()->get();

        return view('supplier.index', ['data'=>$queryModel]);
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
        $data = $supplier;

        return view('supplier.editform', compact('data'));
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
        $supplier->nama = $request->get('nmSupplier');
        $supplier->save();

        return redirect()->route('suppliers.index')->with('status', 'Data Supplier berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // dd("masuk Destroy", $supplier);
        // $supplier->delete();

        // return redirect()->route('suppliers.index')->with('status', 'Data Supplier berhasil dihapus');

        try {
            $supplier->delete();

            return redirect()->route('suppliers.index')->with('status', 'Data Supplier berhasil dihapus');
        } catch(\PDOExeption $e) {
            $msg = "Data Gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan.";

            // hapus sama childnya
            // $msg = $this->handleAllRemoveChild($supplier);

            // pindahin supplier
            // $msg = $this->handleChildWithDefault($supplier);
            
            return redirect()->route('suppliers.index')->with('error', $msg);
        }
    }
    
    // products dipindah suppliernya baru di delete suppliernya
    private function handleChildWithDefault($s) 
    {
        $ps = $s->products();
        $alternatif = Supplier::where('id', '<>', $s->$id)->first();

        foreach($ps as $p) {
            $p->supplier_id = ($alternatif)->id;
            $p->save();
        }

        $s->delete();
    }

    // function untuk hapus supplier dan productsnya
    private function handleAllRemoveChild($s)
    {
        $s->products()->delete();
        $s->delete();

        return "Data dihapus beserta data yang berinteraksi dengan Product : $s->nama";
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

    public function getEditForm(Request $request) 
    {
        $id = $request->get('id');
        $data = Supplier::find($id);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('supplier.editmodalA', compact('data'))->render()
        ), 200);
    }

    public function getEditForm2(Request $request) 
    {
        $id = $request->get('id');
        $data = Supplier::find($id);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('supplier.editmodalB', compact('data'))->render()
        ), 200);
    }

    public function saveData(Request $request)
    {
        $id = $request->get('id');
        $Supplier = Supplier::find($id);
        $Supplier->nama = $request->get('nama');
        $Supplier->save();

        return response()->json(array(
            'status' => 'ok',
            'msg' => 'supplier data updated'
        ), 200);
    }

    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $Supplier = Supplier::find($id);
            $Supplier->delete();

            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Supplier data deleted'
            ), 200);
        } catch(\PDOException $e) {
            return response()->json(array(
                'status' => 'error',
                'msg' => 'Supplier is not deleted. It may be used in the product'
            ), 200);
        }
    }
}
