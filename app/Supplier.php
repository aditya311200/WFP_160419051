<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    public function products() {
        // parameter berisi namespace\namaModel
        return $this->hasMany('App\Product', 'supplier_id', 'id');
    }
}
