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
            //leonela huanca
            //Ronaldo Ramirez Cortez.
            //Marcelo Santiago Zubieta Huanca
            //Victor Manuel Ramirez Cortez
            //Mabel Selena Zubieta Huanca
            //Alejandro Manuel Mayta Sandoval
            //ALejandro Lopez Gutierrez
            //Alexander Yave Colque
            //Miguel Angel Velasquez Mamani
            ['name' => 'admin', 'nickname' => 'admin', 'email' => 'admin@gmail.com', 'access' => now(), 'password' => bcrypt('admin123'),],
            ['name' => 'leonela huanca', 'nickname' => 'leo', 'email' => 'leo@gmail.com', 'access' => now(), 'password' => bcrypt('admin'),],
            ['name' => 'Ronaldo Ramirez Cortez', 'nickname' => 'ronaldo', 'email' => 'ronaldo@gmail.com', 'access' => now(), 'password' => bcrypt('admin'),],
            ['name' => 'Marcelo Santiago Zubieta Huanca', 'nickname' => 'marcelo', 'email' => 'marcelo@gmail.com', 'access' => now(), 'password' => bcrypt('admin'),],
            ['name' => 'Victor Manuel Ramirez Cortez', 'nickname' => 'victor', 'email' => 'victor@gmail.com', 'access' => now(), 'password' => bcrypt('admin'),],
            ['name' => 'Mabel Selena Zubieta Huanca', 'nickname' => 'mabel', 'email' => 'mabel@gmail.com', 'access' => now(), 'password' => bcrypt('admin'),],
            ['name' => 'Alejandro Manuel Mayta Sandoval', 'nickname' => 'alejandro', 'email' => 'ale2@gmail.com', 'access' => now(), 'password' => bcrypt('admin'),],
            ['name' => 'Alejandro Lopez Gutierrez', 'nickname' => 'ale', 'email' => 'ale1@gmail.com', 'access' => now(), 'password' => bcrypt('admin'),],
            ['name' => 'Alexander Yave Colque', 'nickname' => 'alexander', 'email' => 'alexande@gmail.com', 'access' => now(), 'password' => bcrypt('admin'),],
            ['name' => 'Miguel Angel Velasquez Mamani', 'nickname' => 'miguel', 'email' => 'miguel@gmail.com', 'access' => now(), 'password' => bcrypt('admin'),],
        ]);
    }
}
