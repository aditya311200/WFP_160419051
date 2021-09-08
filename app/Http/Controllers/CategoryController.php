<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use App\Product;

class CategoryController extends Controller
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
        $queryBuilder = DB::table('categories')->get();

        // untuk Query dengan Model
        // $queryModel = Product::all();

        // cara 1 dengan isntaks compact. Berarti variabel queryBuilder nanti dikenali
        // pada Controller dan View
        // return view('product.index', compact('queryBuilder'));

        // cara 2 dengan sintaks array. Berarti variabel queryBuilder nanti hanya dikenali
        // pada Controller dan pada View namanya menjadi data
        return view('category.index', ['data'=>$queryBuilder]);
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function showCategory($category_name) 
    {
        // Method 1 : QueryBuilder
        // $data = DB::table('categories')
        //         ->join('products', 'categories.id', '=', 'products.category_id')
        //         ->where('categories.nama', $category_name)
        //         ->get();
        // $result = $data;
        // $getTotalData = DB::table('products')->count();

        // Method 2 : Eloquent Model (with Relationship)
        $data = Category::where('nama', $category_name)->first();
        $result = $data->products;
        $getTotalData = Product::count();

        return view('reportProduct', compact('category_name', 'result', 'getTotalData'));
    }
}
