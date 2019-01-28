<?php

use App\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('pages')->delete();

        $dataSeeds = [
            [
                'pages'  => 1,
                'description' => 'Print on Front Only'
            ],[
                'pages'  => 2,
                'description' => 'Print on Front & Back'
            ]
        ];

        foreach ($dataSeeds as $dataSeed) {
            Page::create($dataSeed);
        }

        Model::reguard();
    }
}
