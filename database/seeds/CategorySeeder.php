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
        //
        \DB::table('categories')->insert([
            'name' => 'Quarto',
        ]);
        \DB::table('categories')->insert([
            'name' => 'Sala',
        ]);
        \DB::table('categories')->insert([
            'name' => 'Cozinha',
        ]);
        \DB::table('categories')->insert([
            'name' => 'Casa de Banho',
        ]);


    }
}
