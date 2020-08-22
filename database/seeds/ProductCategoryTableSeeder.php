<?php

use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_category = collect([
            [
                'product_id' => 'Addidas shirt',
                'category_id' => 'men',
            ],
            [
                'product_id' => 'Addidas shirt',
                'category_id' => 'shirt',
            ],
            [
                'product_id' => 'Addidas tshirt',
                'category_id' => 'tshirt',
            ],
            [
                'product_id' => 'Addidas tshirt',
                'category_id' => 'men',
            ],
            [
                'product_id' => 'Dress',
                'category_id' => 'women',
            ],
            [
                'product_id' => 'Nike shorts',
                'category_id' => 'women',
            ],
            [
                'product_id' => 'Nike shorts',
                'category_id' => 'men',
            ],
        ]);

        $product_category->each(function ($item, $key) {
            \App\Model\ProductCategory::query()->create($item);
        });

    }
}
