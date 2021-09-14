<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class LaporanController extends Controller
{
    public function kategoriproduk() {
        $data = Category::all();

        $arr_data = array();
        foreach($data as $category) {
            $product_min = Product::where('category_id', $category->id)->orderBy('harga_jual', 'asc')->first();
            $product_avg = Product::where('category_id', $category->id)->average('harga_jual');
            $arr_data[$category->id]['category'] = $category;
            $arr_data[$category->id]['min'] = $product_min;
            $arr_data[$category->id]['avg'] = $product_avg;
        }

        return view('laporan.kategoriproduk', compact('arr_data'));
    }
}
