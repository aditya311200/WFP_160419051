<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    
    protected $table = 'suppliers';

    public function products() {
        // parameter berisi namespace\namaModel
        return $this->hasMany('App\Product', 'supplier_id', 'id');
    }
}
