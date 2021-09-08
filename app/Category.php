<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    // nama fungsi products bebas, yang penting esensinya kumpulan produk
    public function products() {
        // parameter berisi namespace\namaModel
        return $this->hasMany('App\Product', 'category_id', 'id');
    }
}
