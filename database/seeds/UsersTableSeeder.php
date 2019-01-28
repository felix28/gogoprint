<?php

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('users')->delete();

        $dataSeed = [
            'email' => 'felixlabayen@yahoo.com',
            'password' => Hash::make('12345678')
        ];

        User::create($dataSeed);

        Model::reguard();
    }
}
