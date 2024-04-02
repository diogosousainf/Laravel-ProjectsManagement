<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 100; $i++) {
            factory(Product::class)->create([
                'category_id' => $i % 4 + 1,
                'project_id' => $i % 20 + 1,
            ]);

        }
    }
}
