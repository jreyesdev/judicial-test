<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prods = [
            [
                'name' => 'Producto 1',
                'price' => 123.45,
                'tax' => 0.05
            ],
            [
                'name' => 'Producto 2',
                'price' => 45.65,
                'tax' => 0.15
            ],
            [
                'name' => 'Producto 3',
                'price' => 39.73,
                'tax' => 0.12
            ],
            [
                'name' => 'Producto 4',
                'price' => 250.00,
                'tax' => 0.08
            ],
            [
                'name' => 'Producto 5',
                'price' => 59.35,
                'tax' => 0.10
            ],
        ];
        foreach($prods as $prod){
            Product::create($prod);
        }
    }
}
