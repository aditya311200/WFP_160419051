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
            'image' => 'roti_coklat.jfif',
        ]);

        DB::table('products')->insert([
            'nama' => 'Roti Keju',
            'stok' => 10,
            'harga_jual' => 12000,
            'harga_produksi' => 10000,
            'category_id' => 2,
            'supplier_id' => 2,
            'image' => 'roti_keju.jpg',
        ]);

        DB::table('products')->insert([
            'nama' => 'Roti Sosis',
            'stok' => 10,
            'harga_jual' => 15000,
            'harga_produksi' => 13000,
            'category_id' => 3,
            'supplier_id' => 3,
            'image' => 'roti_sosis.jpg',
        ]);
        
        DB::table('products')->insert([
            'nama' => 'Donat',
            'stok' => 10,
            'harga_jual' => 12500,
            'harga_produksi' => 10500,
            'category_id' => 4,
            'supplier_id' => 4,
            'image' => 'donat.jpg',
        ]);
        
        DB::table('products')->insert([
            'nama' => 'Roti Sus',
            'stok' => 10,
            'harga_jual' => 13000,
            'harga_produksi' => 11000,
            'category_id' => 5,
            'supplier_id' => 5,
            'image' => 'roti_sus.jfif',
        ]);

        DB::table('products')->insert([
            'nama' => 'Roti Isi',
            'stok' => 10,
            'harga_jual' => 17500,
            'harga_produksi' => 15500,
            'category_id' => 6,
            'supplier_id' => 6,
            'image' => 'roti_isi.jpg',
        ]);
    }
}
