<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //name y pawwows admin victor mabel acfo leo miguel oscar miguel zhms
            [
                'name' => 'admin',
                'nickname' => 'admin',
                'email' => 'admin@gmail.com',
                'access' => now(),
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'victor',
                'nickname' => 'victor',
                'email' => 'victor@gmail.com',
                'access' => now(),
                'password' => bcrypt('victor'),
            ],
            [
                'name' => 'mabel',
                'nickname' => 'mabel',
                'email' => 'mabel@gmail.com',
                'access' => now(),
                'password' => bcrypt('mabel'),
            ],
            [
                'name' => 'acfo',
                'nickname' => 'acfo',
                'email' => 'acfo@gmail.com',
                'access' => now(),
                'password' => bcrypt('acfo'),
            ],
            [
                'name' => 'leo',
                'nickname' => 'leo',
                'email' => 'leo@gmail.com',
                'access' => now(),
                'password' => bcrypt('leo'),
            ],
            [
                'name' => 'miguel1',
                'nickname' => 'miguel1',
                'email' => 'miguel1@gmail.com',
                'access' => now(),
                'password' => bcrypt('miguel1'),
            ],
            [
                'name' => 'oscar',
                'nickname' => 'oscar',
                'email' => 'oscar@gmail.com',
                'access' => now(),
                'password' => bcrypt('oscar'),
            ],
            [
                'name' => 'miguel2',
                'nickname' => 'miguel2',
                'email' => 'miguel2@gmail.com',
                'access' => now(),
                'password' => bcrypt('miguel2'),
            ],
            [
                'name' => 'zhms',
                'nickname' => 'zhms',
                'email' => 'zhms@gmail.com',
                'access' => now(),
                'password' => bcrypt('zhms'),
            ],
        ]);
    }
}
