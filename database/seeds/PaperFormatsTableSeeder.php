<?php

use App\PaperFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PaperFormatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('paper_formats')->delete();

        $dataSeeds = [
            [
                'width'  => 9,
                'height' => 5.5,
                'unit'   => 'cm'
            ],[
                'width'  => 8.5,
                'height' => 5,
                'unit'   => 'cm'
            ]
        ];

        foreach ($dataSeeds as $dataSeed) {
            PaperFormat::create($dataSeed);
        }

        Model::reguard();
    }
}
