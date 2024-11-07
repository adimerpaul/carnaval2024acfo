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
//            Alejanddro Fernando Lopez Gutierrez	5769706 or	Illimani camacho y oblitas
//Edwin Ronaldo Ramirez Cortez	7317487	Arce entre Tacna y tarapaca
//RONALD CHAMBI MAMANI	7306104	Pagador Ballivian y Potosi
//Elizabet Chusicoma Ordoñez 	12613097	Arce y Magallanes
//VICTOR MANUEL RAMIREZ CORTEZ	7317488	Arce esquina tacna
//Clariza Ramirez perez	7368788	Urb Los Ángeles manzano XII
//Alexander Yave Colque	7367668	Aldana pisagua y Antofagasta
//Yave Colque Kevin Axel	7367674	Aldana entre Pisagua y Antofagasta
//leonela huanca pereio	72745573
//moises gonzales pereira
            ['name' => 'admin', 'nickname' => 'admin', 'access' => now(), 'password' => bcrypt('admin123'),],
            ['name' => 'Alejandro Fernando Lopez Gutierrez', 'nickname' => 'Alejandro',  'access' => now(), 'password' => bcrypt('5769706'),],
            ['name' => 'Edwin Ronaldo Ramirez Cortez', 'nickname' => 'Edwin',  'access' => now(), 'password' => bcrypt('7317487'),],
            ['name' => 'RONALD CHAMBI MAMANI', 'nickname' => 'RONALD',  'access' => now(), 'password' => bcrypt('7306104'),],
            ['name' => 'Elizabet Chusicoma Ordoñez', 'nickname' => 'Elizabet',  'access' => now(), 'password' => bcrypt('12613097'),],
            ['name' => 'VICTOR MANUEL RAMIREZ CORTEZ', 'nickname' => 'VICTOR',  'access' => now(), 'password' => bcrypt('7317488'),],
            ['name' => 'Clariza Ramirez perez', 'nickname' => 'Clariza',  'access' => now(), 'password' => bcrypt('7368788'),],
            ['name' => 'Alexander Yave Colque', 'nickname' => 'Alexander',  'access' => now(), 'password' => bcrypt('7367668'),],
            ['name' => 'Yave Colque Kevin Axel', 'nickname' => 'Yave',  'access' => now(), 'password' => bcrypt('7367674'),],
            ['name' => 'leonela huanca pereio', 'nickname' => 'leonela',  'access' => now(), 'password' => bcrypt('72745573'),],
            ['name' => 'moises gonzales pereira', 'nickname' => 'moises',  'access' => now(), 'password' => bcrypt('123456'),],
        ]);
    }
}

























