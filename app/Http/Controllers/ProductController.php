<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // untuk Query dengan RAW
        // $queryRaw = DB::select(DB::raw('select * from products'));

        // untuk Query Builder
        $queryBuilder = DB::table('products')->get();

        // untuk Query dengan Model
        // $queryModel = Product::all();

        // cara 1 dengan isntaks compact. Berarti variabel queryBuilder nanti dikenali
        // pada Controller dan View
        return view('product.index', compact('queryBuilder'));

        // cara 2 dengan sintaks array. Berarti variabel queryBuilder nanti hanya dikenali
        // pada Controller dan pada View namanya menjadi data
        // return view('product.index', ['data'=>$queryModel]);
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // sintaks untuk mengetahui isi dari variabel yang menjadi parameter
        // dd($product);
        // dengan menggunakan parameter Product diatas, maka otomatis akan dibuat querynya
        // seperti "SELECT * FROM products WHERE id = x:

        // $data = $product;
        return view('product.show', compact('product'));
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function front_index() 
    {
        $products = Product::all();
        return view('frontend.product', compact('products'));
    }

    public function addToCart($id)
    {
        $p = Product::find($id);
        $cart = session()->get('cart');

        if(!isset($cart[$id]))
        {
            $cart[$id] = [
                "nama" => $p->nama,
                "quantity" => 1,
                "price" => $p->harga_jual,
                "photo" => $p->image
            ];
        } else {
            $cart[$id]['quantity']++;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart() 
    {
        return view('frontend.cart');
    }
}
