<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    // nama fungsi category bebas, yang penting esensinya satu kategori
    public function category() {
        // parameter berisi namespace\namaModel;
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function supplier() {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }
}
