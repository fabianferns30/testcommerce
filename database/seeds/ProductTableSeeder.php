<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = collect([
            [
                'name' => 'Addidas shirt',
                'sku' => 'SADAD1123SAD',
                'price' => 12.00,
            ],
            [
                'name' => 'Addidas tshirt',
                'sku' => 'SADAD1sas123SAD',
                'price' => 12.00,
            ],
            [
                'name' => 'Dress',
                'sku' => 'SADAD11231231SAD',
                'price' => 12.00,
            ],
            [
                'name' => 'Nike shorts',
                'sku' => 'SA1231DAsasD1123SAD',
                'price' => 12.00,
            ],
        ]);

        $product->each(function ($item, $key) {
            \App\Model\Product::query()->create($item);
        });
    }
}
