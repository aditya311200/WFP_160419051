<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nama' => 'Coklat',
        ]);

        DB::table('categories')->insert([
            'nama' => 'Keju',
        ]);

        DB::table('categories')->insert([
            'nama' => 'Sosis',
        ]);
    }
}
