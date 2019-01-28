<?php

use App\ProductQuantityPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ProductQuantityPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('product_quantity_prices')->delete();

        $quantity = 100;
        $price_per_piece = 4;
        //loop each product configuration
        for ($p = 0; $p < 12; $p++) {
            $product_configuration_id = $p + 1;

            if ($p > 0) {
                $price_per_piece = 5 * $p;
            }

            for ($q = 0; $q < 5; $q++) {
                //insert 5 quantities for each product configuration
                ProductQuantityPrice::create([
                    'product_configuration_id' => $product_configuration_id,
                    'quantity'  => $quantity,
                    'price_per_piece' => $price_per_piece
                ]);
                 
                $quantity += 100;
                $price_per_piece -= 0.1;
            }

            $quantity = 100;
        }

        Model::reguard();
    }
}
