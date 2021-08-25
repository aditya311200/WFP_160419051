<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'nama' => 'Roti Coklat',
            'stok' => 10,
            'harga_jual' => 10000,
            'harga_produksi' => 8000,
            'category_id' => 1,
            'supplier_id' => 1,
        ]);

        DB::table('products')->insert([
            'nama' => 'Roti Keju',
            'stok' => 10,
            'harga_jual' => 12000,
            'harga_produksi' => 10000,
            'category_id' => 2,
            'supplier_id' => 2,
        ]);

        DB::table('products')->insert([
            'nama' => 'Roti Sosis',
            'stok' => 10,
            'harga_jual' => 15000,
            'harga_produksi' => 13000,
            'category_id' => 3,
            'supplier_id' => 3,
        ]);
    }
}
