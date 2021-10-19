<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Antonio Varela",
            'email' => 'agg.antoniovat',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => "Denisse castillo Ortega",
            'email' => 'agg.denisseor',
            'password' => Hash::make('12345678'),
        ]);
    }
}
