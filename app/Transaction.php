<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function customer() {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function products() {
        return $this->belongsToMany('App\Product', 'product_transaction', 'transaction_id', 'product_id')->withPivot('quantity', 'harga_produk', 'subtotal');
    }

    public function insertProduct($cart, $user) {
        $total = 0;

        foreach($cart as $id => $detail)
        {
            $total += $detail['price'] * $detail['quantity'];
            $this->products()->attach($id, ['quantity' => $detail['quantity'], 'subtotal' => $detail['price']]);
        }

        return $total;
    }
}
