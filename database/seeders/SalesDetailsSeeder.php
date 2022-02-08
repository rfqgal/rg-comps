<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {               
        for ($i=0; $i < 60; $i++) { 
            $product_id = random_int(1, 7);
            $qty = random_int(1, 10);

            DB::table('sales_details')->insert([
                'sale_id' => $i+1,
                'product_code' => Product::find($product_id)->code,
                'quantity' => $qty,
                'price' => Product::find($product_id)->price,
                'total' => Product::find($product_id)->price*$qty,
            ]);
        }
        for ($i=0; $i < 60; $i++) { 
            $product_id = random_int(1, 7);
            $qty = random_int(1, 10);

            DB::table('sales_details')->insert([
                'sale_id' => random_int(1, 60),
                'product_code' => Product::find($product_id)->code,
                'quantity' => $qty,
                'price' => Product::find($product_id)->price,
                'total' => Product::find($product_id)->price*$qty,
            ]);
        }
    }
}
