<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'name' => 'Med ' . $i,
                'slug' => 'med-' . $i,
                'details' => 'Zdrav med',
                'price' => rand(150, 300),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/med-'.$i.'.jpg',
            ]);
        }

        

        // Propolis
        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'name' => 'Propolis ' . $i,
                'slug' => 'propolis-' . $i,
                'details' => 'Zdrav nacin zivota',
                'price' => rand(50, 100),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/propolis-'.$i.'.jpg',
            ]);
        }
    }
}
