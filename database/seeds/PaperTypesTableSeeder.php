<?php

use App\PaperType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PaperTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('paper_types')->delete();

        $dataSeeds = [
            [
                'type'  => '80g Art Paper'
            ],[
                'type'  => '150g Art Card'
            ],[
                'type'  => '250g Art Card'
            ]
        ];

        foreach ($dataSeeds as $dataSeed) {
            PaperType::create($dataSeed);
        }

        Model::reguard();
    }
}
