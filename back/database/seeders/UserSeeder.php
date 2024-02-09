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

//            A.S. RHERY AVILA MIRANDA 	3089717 OR.	68333334
//LIC. JAQUELIN TORREZ ZAMBRANA	3101362 OR.	68330749
//ING. JUAN FLORES BUSTILLOS	5541262 PT.	75405930
//RONALD VILLCA QUENA	7335981 OR	75710650
//HELEN ESCALIER TORREZ	7363558 OR.	65408761
//TEC. CARLOS AVILA MIRANDA 		76151308
            ['name' => 'a.s. rhery avila miranda', 'nickname' => 'rhery', 'email' => 'rhery@gmail.com', 'access' => now(), 'password' => bcrypt('68333334'),],
            ['name' => 'lic. jaquelin torrez zambrana', 'nickname' => 'jaquelin', 'email' => 'jaquelin@gmail.com', 'access' => now(), 'password' => bcrypt('68330749'),],
            ['name' => 'ing. juan flores bustillos', 'nickname' => 'juan', 'email' => 'juan@gmail.com', 'access' => now(), 'password' => bcrypt('75405930'),],
            ['name' => 'ronald villca quena', 'nickname' => 'ronald', 'email' => 'ronald@gmail.com', 'access' => now(), 'password' => bcrypt('75710650'),],
            ['name' => 'helen escalier torrez', 'nickname' => 'helen', 'email' => 'helen@gmail.com', 'access' => now(), 'password' => bcrypt('65408761'),],
            ['name' => 'tec. carlos avila miranda', 'nickname' => 'carlos', 'email' => 'carlos@gmail.com', 'access' => now(), 'password' => bcrypt('76151308'),],
        ]);
    }
}

























