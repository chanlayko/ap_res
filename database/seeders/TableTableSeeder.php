<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public $i;
    public function run()
    {
        
        DB::table('Table')->insert([
            'number' => 1,
        ]);
        DB::table('Table')->insert([
            'number' => 2,
        ]);
        DB::table('Table')->insert([
            'number' => 3,
        ]);
        DB::table('Table')->insert([
            'number' => 4,
        ]);
        DB::table('Table')->insert([
            'number' => 5,
        ]);
       
    }
}
