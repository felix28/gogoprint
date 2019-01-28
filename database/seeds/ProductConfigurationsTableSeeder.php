<?php

use App\ProductConfiguration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ProductConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('product_configurations')->delete();

        $dataSeeds = [
            [
                'name'            => 'Config 1',
                'price'           => 10.00,
                'paper_format_id' => 1,
                'page_id'         => 1,
                'paper_type_id'   => 1,
            ],[
                'name'            => 'Config 2',
                'price'           => 20.00,
                'paper_format_id' => 1,
                'page_id'         => 1,
                'paper_type_id'   => 2,
            ],[
                'name'            => 'Config 3',
                'price'           => 30.00,
                'paper_format_id' => 1,
                'page_id'         => 1,
                'paper_type_id'   => 3,
            ],[
                'name'            => 'Config 4',
                'price'           => 40.00,
                'paper_format_id' => 1,
                'page_id'         => 2,
                'paper_type_id'   => 1,
            ],[
                'name'            => 'Config 5',
                'price'           => 50.00,
                'paper_format_id' => 1,
                'page_id'         => 2,
                'paper_type_id'   => 2,
            ],[
                'name'            => 'Config 6',
                'price'           => 60.00,
                'paper_format_id' => 1,
                'page_id'         => 2,
                'paper_type_id'   => 3,
            ],[
                'name'            => 'Config 7',
                'price'           => 70.00,
                'paper_format_id' => 2,
                'page_id'         => 1,
                'paper_type_id'   => 1,
            ],[
                'name'            => 'Config 8',
                'price'           => 80.00,
                'paper_format_id' => 2,
                'page_id'         => 1,
                'paper_type_id'   => 2,
            ],[
                'name'            => 'Config 9',
                'price'           => 90.00,
                'paper_format_id' => 2,
                'page_id'         => 1,
                'paper_type_id'   => 3,
            ],[
                'name'            => 'Config 10',
                'price'           => 100.00,
                'paper_format_id' => 2,
                'page_id'         => 2,
                'paper_type_id'   => 1,
            ],[
                'name'            => 'Config 11',
                'price'           => 200.00,
                'paper_format_id' => 2,
                'page_id'         => 2,
                'paper_type_id'   => 2,
            ],[
                'name'            => 'Config 12',
                'price'           => 300.00,
                'paper_format_id' => 2,
                'page_id'         => 2,
                'paper_type_id'   => 3,
            ]
        ];

        foreach ($dataSeeds as $dataSeed) {
            ProductConfiguration::create($dataSeed);
        }

        Model::reguard();
    }
}
