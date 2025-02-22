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
            ['name' => 'admin', 'nickname' => 'admin', 'access' => now(), 'password' => bcrypt('admin123A'),],
//            ['name' => 'Alejandro Fernando Lopez Gutierrez', 'nickname' => 'Alejandro',  'access' => now(), 'password' => bcrypt('5769706'),],
//            ['name' => 'Edwin Ronaldo Ramirez Cortez', 'nickname' => 'Edwin',  'access' => now(), 'password' => bcrypt('7317487'),],
//            ['name' => 'RONALD CHAMBI MAMANI', 'nickname' => 'RONALD',  'access' => now(), 'password' => bcrypt('7306104'),],
//            ['name' => 'Elizabet Chusicoma Ordoñez', 'nickname' => 'Elizabet',  'access' => now(), 'password' => bcrypt('12613097'),],
//            ['name' => 'VICTOR MANUEL RAMIREZ CORTEZ', 'nickname' => 'VICTOR',  'access' => now(), 'password' => bcrypt('7317488'),],
//            ['name' => 'Alexander Yave Colque', 'nickname' => 'Alexander',  'access' => now(), 'password' => bcrypt('7367668'),],
//            ['name' => 'Yave Colque Kevin Axel', 'nickname' => 'Yave',  'access' => now(), 'password' => bcrypt('7367674'),],
//            ['name' => 'leonela huanca pereio', 'nickname' => 'leonela',  'access' => now(), 'password' => bcrypt('72745573'),],
//            ['name' => 'moises gonzales pereira', 'nickname' => 'moises',  'access' => now(), 'password' => bcrypt('123456'),],
            ['name' => 'Leonela Huanca Pereira', 'nickname' => 'leonela',  'access' => now(), 'password' => bcrypt('7274573'),],
            ['name' => 'Moisés Aharon Gonzales Pereira', 'nickname' => 'moises',  'access' => now(), 'password' => bcrypt('7289370'),],
            ['name' => 'Yave Colque Kevin Axel', 'nickname' => 'yave',  'access' => now(), 'password' => bcrypt('7367674'),],
            ['name' => 'Chusicoma Ordoñez Elizabet', 'nickname' => 'elizabet',  'access' => now(), 'password' => bcrypt('12613097'),],
            ['name' => 'Edwin R. Ramírez Cortez', 'nickname' => 'edwin',  'access' => now(), 'password' => bcrypt('7317487'),],
            ['name' => 'Evelyn Ramirez', 'nickname' => 'evelyn',  'access' => now(), 'password' => bcrypt('3540043'),],
            ['name' => 'Victor Manuel Ramirez Cortez', 'nickname' => 'victor',  'access' => now(), 'password' => bcrypt('7317488'),],
            ['name' => 'Clariza Ramirez perez', 'nickname' => 'clariza',  'access' => now(), 'password' => bcrypt('7368788'),],
            ['name' => 'Ana Lía Garabito Huayta', 'nickname' => 'ana',  'access' => now(), 'password' => bcrypt('7302022'),],
            ['name' => 'Gabriel Bazualdo Sánchez', 'nickname' => 'gabriel',  'access' => now(), 'password' => bcrypt('3116323'),],
            ['name' => 'Alejandro Ramírez', 'nickname' => 'alejandro',  'access' => now(), 'password' => bcrypt('5769706'),],
        ]);
//
//        ['positionSaturday'=>'1','positionSunday'=>'10','name'=>'GRAN TRADICIONAL AUTENTICA DIABLADA ORURO', 'imagen'=>'diablada.png'],
//            ['positionSaturday'=>'2','positionSunday'=>'11','name'=>'FRATERNIDAD HIJOS DEL SOL LOS INCAS', 'imagen'=>'incas.png'],
//            ['positionSaturday'=>'3','positionSunday'=>'12','name'=>'CONJUNTO FOLKLORICO MORENADA ZONA NORTE', 'imagen'=>'morenada.png'],
//            ['positionSaturday'=>'4','positionSunday'=>'13','name'=>'FRAT. ARTISTICA ZAMPOÑEROS HIJOS DEL PAGADOR', 'imagen'=>'zamponeros.png'],
//            ['positionSaturday'=>'5','positionSunday'=>'14','name'=>'CENTRO TRADICIONAL NEGRITOS DE PAGADOR', 'imagen'=>'negritos.png'],
//            ['positionSaturday'=>'6','positionSunday'=>'15','name'=>'CONJUNTO FOLKLORICO AHUATIRIS', 'imagen'=>'antawaras.png'],
//            ['positionSaturday'=>'7','positionSunday'=>'16','name'=>'CONJUNTO WACA WACAS SAN AGUSTIN DERECHO', 'imagen'=>'wacatoncoris.png'],
//            ['positionSaturday'=>'8','positionSunday'=>'17','name'=>'FRATERNIDAD MORENADA CENTRAL ORURO', 'imagen'=>'morenadafull.png'],
//            ['positionSaturday'=>'9','positionSunday'=>'18','name'=>'CONJUNTO CAPORALES INFANTILES IGNACIO LEON', 'imagen'=>'caporales.png'],
//            ['positionSaturday'=>'10','positionSunday'=>'19','name'=>'CONJUNTO TRADICIONAL FOLKLORICO DIABLADA ORURO', 'imagen'=>'diablada.png'],
//            ['positionSaturday'=>'11','positionSunday'=>'20','name'=>'CONJUNTO TRADICIONAL LLAMERADA ZONA NORTE ORURO', 'imagen'=>'llamerada.png'],
//            ['positionSaturday'=>'12','positionSunday'=>'21','name'=>'FRATERNIDAD CAPORALES CENTRALISTAS', 'imagen'=>'caporales.png'],
//            ['positionSaturday'=>'13','positionSunday'=>'22','name'=>'FRAT. MORENADA CENTRAL FDDA. COM, COCANI', 'imagen'=>'morenada.png'],
//            ['positionSaturday'=>'14','positionSunday'=>'23','name'=>'CONJUNTO FOLKLORICO TOBAS ZONA SUD', 'imagen'=>'tobas.png'],
//            ['positionSaturday'=>'15','positionSunday'=>'24','name'=>'CONJUNTO NEGRITOS UNIDOS DE LA SAYA', 'imagen'=>'negritos.png'],
//            ['positionSaturday'=>'16','positionSunday'=>'25','name'=>'CONJUNTO WACATOCORIS URUS', 'imagen'=>'wacatoncoris.png'],
//            ['positionSaturday'=>'17','positionSunday'=>'26','name'=>'CONJUNTO FOLKLORICO ANTAWARA', 'imagen'=>'antawaras.png'],
//            ['positionSaturday'=>'18','positionSunday'=>'27','name'=>'CONJUNTO TINKUS LOS TOLKAS', 'imagen'=>'tinkus.png'],
//            ['positionSaturday'=>'19','positionSunday'=>'37','name'=>'CONJUNTO MORENADA MEJILLONES', 'imagen'=>'morenada.png'],
//            ['positionSaturday'=>'20','positionSunday'=>'38','name'=>'FRATERNIDAD FOLKLORICA LLAMERADA SOCAVÓN', 'imagen'=>'llamerada.png'],
//            ['positionSaturday'=>'21','positionSunday'=>'39','name'=>'CONJUNTO FOLK. Y CULTURAL PHUJLLAY ORURO', 'imagen'=>'pujllay.png'],
//            ['positionSaturday'=>'22','positionSunday'=>'40','name'=>'GRUPO DE DANZA ESTILIZADA SURI SICURI', 'imagen'=>'surisicuri.png'],
//            ['positionSaturday'=>'23','positionSunday'=>'41','name'=>'CONJUNTO FOLKLORICO SAMBOS CAPORALES', 'imagen'=>'caporales.png'],
//            ['positionSaturday'=>'24','positionSunday'=>'42','name'=>'FRATERNIDAD CULLAGUADA ORURO', 'imagen'=>'cullaguada.png'],
//            ['positionSaturday'=>'25','positionSunday'=>'43','name'=>'CONJUNTO TRADICIONAL TOBAS ZONA CENTRAL', 'imagen'=>'tobas.png'],
//            ['positionSaturday'=>'26','positionSunday'=>'44','name'=>'CONJUNTO FOLKLORICO KORY MAJTAS CENTRAL', 'imagen'=>'zamponeros.png'],
//            ['positionSaturday'=>'27','positionSunday'=>'1','name'=>'DIABLADA FERROVIARIA ', 'imagen'=>'diablada.png'],
//            ['positionSaturday'=>'28','positionSunday'=>'2','name'=>'FRAT. REYES MORENOS FERRARI GHEZZI', 'imagen'=>'morenada.png'],
//            ['positionSaturday'=>'29','positionSunday'=>'3','name'=>'CAPORALES REYES DE LA TUNTUNA ENAF', 'imagen'=>'caporales.png'],
//            ['positionSaturday'=>'30','positionSunday'=>'4','name'=>'CONJUNTO TINKU LOS JAIRAS DE ORURO', 'imagen'=>'tinkus.png'],
//            ['positionSaturday'=>'31','positionSunday'=>'5','name'=>'FRAT. CULLAGUADA TERRIBLES QUIRQUINCHOS', 'imagen'=>'cullaguada.png'],
//            ['positionSaturday'=>'32','positionSunday'=>'6','name'=>'FRATERNIDAD KALLAWAYAS BOLIVIA', 'imagen'=>'antawaras.png'],
//            ['positionSaturday'=>'33','positionSunday'=>'7','name'=>'CONJ. POTOLOS JHILANCOS CHAYANTA', 'imagen'=>'potolos.png'],
//            ['positionSaturday'=>'34','positionSunday'=>'8','name'=>'CONJUNTO FOLKLORICO Y CULTURAL DOCTORCITOS ITOS', 'imagen'=>'doctorcitos.png'],
//            ['positionSaturday'=>'35','positionSunday'=>'9','name'=>'FRATERNIDAD DE DANZA ESTILIZADA INTI LLAJTA', 'imagen'=>'antawaras.png'],
//            ['positionSaturday'=>'36','positionSunday'=>'45','name'=>'DIABLADA ARTISTICA URUS', 'imagen'=>'diablada.png'],
//            ['positionSaturday'=>'37','positionSunday'=>'46','name'=>'FRATERNIDAD CULTURAL REYES MORENOS COMIBOL', 'imagen'=>'morenada.png'],
//            ['positionSaturday'=>'38','positionSunday'=>'47','name'=>'CONJUNTO ARTISTICO Y CULTURAL TOBAS URU URU', 'imagen'=>'tobas.png'],
//            ['positionSaturday'=>'39','positionSunday'=>'48','name'=>'FRAT. FOLK. CULT. CAPORALES UNIV. SAN SIMÓN', 'imagen'=>'caporales.png'],
//            ['positionSaturday'=>'40','positionSunday'=>'49','name'=>'CONJUNTO AUTOCTONO WITITIS', 'imagen'=>'wititis.png'],
//            ['positionSaturday'=>'41','positionSunday'=>'50','name'=>'CONJUNTO TINKUS HUAJCHAS', 'imagen'=>'tinkus.png'],
//            ['positionSaturday'=>'42','positionSunday'=>'51','name'=>'INCAS KOLLASUYO HIJOS DEL SOCAVON', 'imagen'=>'incas.png'],
//            ['positionSaturday'=>'43','positionSunday'=>'52','name'=>'TARQUEADA JATUN JALLPA', 'imagen'=>'antawaras.png'],
//            ['positionSaturday'=>'44','positionSunday'=>'28','name'=>'FRATERNIDAD MORENADA METALURGICA ENAF', 'imagen'=>'morenada.png'],
//            ['positionSaturday'=>'45','positionSunday'=>'29','name'=>'CENTRO CULTURAL RIKJCHARY LLAJTA', 'imagen'=>'antawaras.png'],
//            ['positionSaturday'=>'46','positionSunday'=>'30','name'=>'CONJUNTO UNIVERSITARIO SURI', 'imagen'=>'surisicuri.png'],
//            ['positionSaturday'=>'47','positionSunday'=>'31','name'=>'CONJUNTO KANTUS SARTAÑANI', 'imagen'=>'kantus.png'],
//            ['positionSaturday'=>'48','positionSunday'=>'32','name'=>'FRATERNIDAD CAPORALES C.B.N.', 'imagen'=>'caporales.png'],
//            ['positionSaturday'=>'49','positionSunday'=>'33','name'=>'GRUPO CULTURAL AUTOCTONO SUMAJ PUNCHAY', 'imagen'=>'antawaras.png'],
//            ['positionSaturday'=>'50','positionSunday'=>'34','name'=>'FRAT. CULTURAL TINKUS BOLIVIA (AYLLU LLAJWAS)', 'imagen'=>'tinkus.png'],
//            ['positionSaturday'=>'51','positionSunday'=>'35','name'=>'FRAT. FOLK. ARTÍSTICA Y CULTURAL PHUJLLAY', 'imagen'=>'pujllay.png'],
//            ['positionSaturday'=>'52','positionSunday'=>'36','name'=>'FRAT. ARTÍSTICA Y CULTURAL LA DIABLADA', 'imagen'=>'diablada.png'],
        DB::table('users')->insert([
            ['name' => 'autentica', 'nickname' => 'autentica', 'access' => now(), 'password' => bcrypt('autentica'), 'dancer_id' => 1],
            ['name' => 'incas', 'nickname' => 'incas', 'access' => now(), 'password' => bcrypt('incas'), 'dancer_id' => 2],
            ['name' => 'morenada', 'nickname' => 'morenada', 'access' => now(), 'password' => bcrypt('morenada'), 'dancer_id' => 3],
            ['name' => 'zamponeros', 'nickname' => 'zamponeros', 'access' => now(), 'password' => bcrypt('zamponeros'), 'dancer_id' => 4],
            ['name' => 'negritos', 'nickname' => 'negritos', 'access' => now(), 'password' => bcrypt('negritos'), 'dancer_id' => 5],
            ['name' => 'ahuatiris', 'nickname' => 'ahuatiris', 'access' => now(), 'password' => bcrypt('ahuatiris'), 'dancer_id' => 6],
            ['name' => 'wacatoncoris', 'nickname' => 'wacatoncoris', 'access' => now(), 'password' => bcrypt('wacatoncoris'), 'dancer_id' => 7],
            ['name' => 'morenadafull', 'nickname' => 'morenadafull', 'access' => now(), 'password' => bcrypt('morenadafull'), 'dancer_id' => 8],
            ['name' => 'ignacio', 'nickname' => 'ignacio', 'access' => now(), 'password' => bcrypt('ignacio'), 'dancer_id' => 9],
            ['name' => 'tradicional', 'nickname' => 'tradicional', 'access' => now(), 'password' => bcrypt('tradicional'), 'dancer_id' => 10],
            ['name' => 'llamerada', 'nickname' => 'llamerada', 'access' => now(), 'password' => bcrypt('llamerada'), 'dancer_id' => 11],
            ['name' => 'centralistas', 'nickname' => 'centralistas', 'access' => now(), 'password' => bcrypt('centralistas'), 'dancer_id' => 12],
            ['name' => 'cocani', 'nickname' => 'cocani', 'access' => now(), 'password' => bcrypt('cocani'), 'dancer_id' => 13],
            ['name' => 'tobas', 'nickname' => 'tobas', 'access' => now(), 'password' => bcrypt('tobas'), 'dancer_id' => 14],
            ['name' => 'unidos', 'nickname' => 'unidos', 'access' => now(), 'password' => bcrypt('unidos'), 'dancer_id' => 15],
            ['name' => 'urus', 'nickname' => 'urus', 'access' => now(), 'password' => bcrypt('urus'), 'dancer_id' => 16],
            ['name' => 'antawara', 'nickname' => 'antawara', 'access' => now(), 'password' => bcrypt('antawara'), 'dancer_id' => 17],
            ['name' => 'tolkas', 'nickname' => 'tolkas', 'access' => now(), 'password' => bcrypt('tolkas'), 'dancer_id' => 18],
            ['name' => 'mejillones', 'nickname' => 'mejillones', 'access' => now(), 'password' => bcrypt('mejillones'), 'dancer_id' => 19],
            ['name' => 'socavon', 'nickname' => 'socavon', 'access' => now(), 'password' => bcrypt('socavon'), 'dancer_id' => 20],
            ['name' => 'pujllay', 'nickname' => 'pujllay', 'access' => now(), 'password' => bcrypt('pujllay'), 'dancer_id' => 21],
            ['name' => 'surisicuri', 'nickname' => 'surisicuri', 'access' => now(), 'password' => bcrypt('surisicuri'), 'dancer_id' => 22],
            ['name' => 'sambos', 'nickname' => 'sambos', 'access' => now(), 'password' => bcrypt('sambos'), 'dancer_id' => 23],
            ['name' => 'cullaguada', 'nickname' => 'cullaguada', 'access' => now(), 'password' => bcrypt('cullaguada'), 'dancer_id' => 24],
            ['name' => 'central', 'nickname' => 'central', 'access' => now(), 'password' => bcrypt('central'), 'dancer_id' => 25],
            ['name' => 'kory', 'nickname' => 'kory', 'access' => now(), 'password' => bcrypt('kory'), 'dancer_id' => 26],
            ['name' => 'ferroviaria', 'nickname' => 'ferroviaria', 'access' => now(), 'password' => bcrypt('ferroviaria'), 'dancer_id' => 27],
            ['name' => 'ferrari', 'nickname' => 'ferrari', 'access' => now(), 'password' => bcrypt('ferrari'), 'dancer_id' => 28],
            ['name' => 'enaf', 'nickname' => 'enaf', 'access' => now(), 'password' => bcrypt('enaf'), 'dancer_id' => 29],
            ['name' => 'jairas', 'nickname' => 'jairas', 'access' => now(), 'password' => bcrypt('jairas'), 'dancer_id' => 30],
            ['name' => 'quirquinchos', 'nickname' => 'quirquinchos', 'access' => now(), 'password' => bcrypt('quirquinchos'), 'dancer_id' => 31],
            ['name' => 'kallawayas', 'nickname' => 'kallawayas', 'access' => now(), 'password' => bcrypt('kallawayas'), 'dancer_id' => 32],
            ['name' => 'potolos', 'nickname' => 'potolos', 'access' => now(), 'password' => bcrypt('potolos'), 'dancer_id' => 33],
            ['name' => 'doctorcitos', 'nickname' => 'doctorcitos', 'access' => now(), 'password' => bcrypt('doctorcitos'), 'dancer_id' => 34],
            ['name' => 'inti', 'nickname' => 'inti', 'access' => now(), 'password' => bcrypt('inti'), 'dancer_id' => 35],
            ['name' => 'urus2', 'nickname' => 'urus2', 'access' => now(), 'password' => bcrypt('urus2'), 'dancer_id' => 36],
            ['name' => 'comibol', 'nickname' => 'comibol', 'access' => now(), 'password' => bcrypt('comibol'), 'dancer_id' => 37],
            ['name' => 'uru_uru', 'nickname' => 'uru_uru', 'access' => now(), 'password' => bcrypt('uru_uru'), 'dancer_id' => 38],
            ['name' => 'simon', 'nickname' => 'simon', 'access' => now(), 'password' => bcrypt('simon'), 'dancer_id' => 39],
            ['name' => 'wititis', 'nickname' => 'wititis', 'access' => now(), 'password' => bcrypt('wititis'), 'dancer_id' => 40],
            ['name' => 'huajchas', 'nickname' => 'huajchas', 'access' => now(), 'password' => bcrypt('huajchas'), 'dancer_id' => 41],
            ['name' => 'socavon2', 'nickname' => 'socavon2', 'access' => now(), 'password' => bcrypt('socavon2'), 'dancer_id' => 42],
            ['name' => 'jallpa', 'nickname' => 'jallpa', 'access' => now(), 'password' => bcrypt('jallpa'), 'dancer_id' => 43],
            ['name' => 'metallurgica', 'nickname' => 'metallurgica', 'access' => now(), 'password' => bcrypt('metallurgica'), 'dancer_id' => 44],
            ['name' => 'rikjchary', 'nickname' => 'rikjchary', 'access' => now(), 'password' => bcrypt('rikjchary'), 'dancer_id' => 45],
            ['name' => 'suri', 'nickname' => 'suri', 'access' => now(), 'password' => bcrypt('suri'), 'dancer_id' => 46],
            ['name' => 'kantus', 'nickname' => 'kantus', 'access' => now(), 'password' => bcrypt('kantus'), 'dancer_id' => 47],
            ['name' => 'cbn', 'nickname' => 'cbn', 'access' => now(), 'password' => bcrypt('cbn'), 'dancer_id' => 48],
            ['name' => 'sumaj', 'nickname' => 'sumaj', 'access' => now(), 'password' => bcrypt('sumaj'), 'dancer_id' => 49],
            ['name' => 'ayllu', 'nickname' => 'ayllu', 'access' => now(), 'password' => bcrypt('ayllu'), 'dancer_id' => 50],
            ['name' => 'phujllay', 'nickname' => 'phujllay', 'access' => now(), 'password' => bcrypt('phujllay'), 'dancer_id' => 51],
            ['name' => 'diablada', 'nickname' => 'diablada', 'access' => now(), 'password' => bcrypt('diablada'), 'dancer_id' => 52],

//            ['name' => 'inicio', 'nickname' => 'inicio', 'access' => now(), 'password' => bcrypt('inicio'), 'dancer_id' => 53],
//            ['name' => 'fin', 'nickname' => 'fin', 'access' => now(), 'password' => bcrypt('fin'), 'dancer_id' => 54],
//
//
//            ['name' => 'poopo', 'nickname' => 'poopo', 'access' => now(), 'password' => bcrypt('poopo'), 'dancer_id' => 55],
//            ['name' => 'pagador', 'nickname' => 'pagador', 'access' => now(), 'password' => bcrypt('pagador'), 'dancer_id' => 56],
//            ['name' => 'bolivia', 'nickname' => 'bolivia', 'access' => now(), 'password' => bcrypt('bolivia'), 'dancer_id' => 57],
//            ['name' => 'real', 'nickname' => 'real', 'access' => now(), 'password' => bcrypt('real'), 'dancer_id' => 58],
        ]);

    }
}

























