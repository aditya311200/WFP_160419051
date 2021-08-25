<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'nama' => 'PT.Coklat',
            'alamat' => 'Jalan Coklat',
        ]);

        DB::table('suppliers')->insert([
            'nama' => 'PT.Keju',
            'alamat' => 'Jalan Keju',
        ]);

        DB::table('suppliers')->insert([
            'nama' => 'PT.Sosis',
            'alamat' => 'Jalan Sosis',
        ]);
    }
}
