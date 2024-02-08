<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cogs')->insert([
            ['name'=>'vistas 1','value'=>0],
            ['name'=>'vistas 2','value'=>0],
        ]);
    }
}
