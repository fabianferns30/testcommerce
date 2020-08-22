<?php

use Illuminate\Database\Seeder;

class CateroriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect([
            [
                'name' => 'men',
            ],
            [
                'name' => 'women',
            ],
            [
                'parent_id' => 'men',
                'name' => 'shirt',
            ],
            [
                'parent_id' => 'men',
                'name' => 'tshirt',
            ],
            [
                'parent_id' => 'women',
                'name' => 'tshirt',
            ],
            [
                'parent_id' => 'women',
                'name' => 'dress',
            ],

        ]);

        $categories->each(function ($item, $key) {
            \App\Model\Categories::query()->create($item);
        });
    }
}
