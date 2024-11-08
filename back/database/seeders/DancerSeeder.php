<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dancers')->insert([
            ['positionSaturday'=>'1','positionSunday'=>'10','name'=>'GRAN TRADICIONAL AUTENTICA DIABLADA ORURO', 'imagen'=>'diablada.png'],
            ['positionSaturday'=>'2','positionSunday'=>'11','name'=>'FRATERNIDAD HIJOS DEL SOL LOS INCAS', 'imagen'=>'incas.png'],
            ['positionSaturday'=>'3','positionSunday'=>'12','name'=>'CONJUNTO FOLKLORICO MORENADA ZONA NORTE', 'imagen'=>'morenada.png'],
            ['positionSaturday'=>'4','positionSunday'=>'13','name'=>'FRAT. ARTISTICA ZAMPOÑEROS HIJOS DEL PAGADOR', 'imagen'=>'zamponeros.png'],
            ['positionSaturday'=>'5','positionSunday'=>'14','name'=>'CENTRO TRADICIONAL NEGRITOS DE PAGADOR', 'imagen'=>'negritos.png'],
            ['positionSaturday'=>'6','positionSunday'=>'15','name'=>'CONJUNTO FOLKLORICO AHUATIRIS', 'imagen'=>'antawaras.png'],
            ['positionSaturday'=>'7','positionSunday'=>'16','name'=>'CONJUNTO WACA WACAS SAN AGUSTIN DERECHO', 'imagen'=>'wacatoncoris.png'],
            ['positionSaturday'=>'8','positionSunday'=>'17','name'=>'FRATERNIDAD MORENADA CENTRAL ORURO', 'imagen'=>'morenadafull.png'],
            ['positionSaturday'=>'9','positionSunday'=>'18','name'=>'CONJUNTO CAPORALES INFANTILES IGNACIO LEON', 'imagen'=>'caporales.png'],
            ['positionSaturday'=>'10','positionSunday'=>'19','name'=>'CONJUNTO TRADICIONAL FOLKLORICO DIABLADA ORURO', 'imagen'=>'diablada.png'],
            ['positionSaturday'=>'11','positionSunday'=>'20','name'=>'CONJUNTO TRADICIONAL LLAMERADA ZONA NORTE ORURO', 'imagen'=>'llamerada.png'],
            ['positionSaturday'=>'12','positionSunday'=>'21','name'=>'FRATERNIDAD CAPORALES CENTRALISTAS', 'imagen'=>'caporales.png'],
            ['positionSaturday'=>'13','positionSunday'=>'22','name'=>'FRAT. MORENADA CENTRAL FDDA. COM, COCANI', 'imagen'=>'morenada.png'],
            ['positionSaturday'=>'14','positionSunday'=>'23','name'=>'CONJUNTO FOLKLORICO TOBAS ZONA SUD', 'imagen'=>'tobas.png'],
            ['positionSaturday'=>'15','positionSunday'=>'24','name'=>'CONJUNTO NEGRITOS UNIDOS DE LA SAYA', 'imagen'=>'negritos.png'],
            ['positionSaturday'=>'16','positionSunday'=>'25','name'=>'CONJUNTO WACATOCORIS URUS', 'imagen'=>'wacatoncoris.png'],
            ['positionSaturday'=>'17','positionSunday'=>'26','name'=>'CONJUNTO FOLKLORICO ANTAWARA', 'imagen'=>'antawaras.png'],
            ['positionSaturday'=>'18','positionSunday'=>'27','name'=>'CONJUNTO TINKUS LOS TOLKAS', 'imagen'=>'tinkus.png'],
            ['positionSaturday'=>'19','positionSunday'=>'37','name'=>'CONJUNTO MORENADA MEJILLONES', 'imagen'=>'morenada.png'],
            ['positionSaturday'=>'20','positionSunday'=>'38','name'=>'FRATERNIDAD FOLKLORICA LLAMERADA SOCAVÓN', 'imagen'=>'llamerada.png'],
            ['positionSaturday'=>'21','positionSunday'=>'39','name'=>'CONJUNTO FOLK. Y CULTURAL PHUJLLAY ORURO', 'imagen'=>'pujllay.png'],
            ['positionSaturday'=>'22','positionSunday'=>'40','name'=>'GRUPO DE DANZA ESTILIZADA SURI SICURI', 'imagen'=>'surisicuri.png'],
            ['positionSaturday'=>'23','positionSunday'=>'41','name'=>'CONJUNTO FOLKLORICO SAMBOS CAPORALES', 'imagen'=>'caporales.png'],
            ['positionSaturday'=>'24','positionSunday'=>'42','name'=>'FRATERNIDAD CULLAGUADA ORURO', 'imagen'=>'cullaguada.png'],
            ['positionSaturday'=>'25','positionSunday'=>'43','name'=>'CONJUNTO TRADICIONAL TOBAS ZONA CENTRAL', 'imagen'=>'tobas.png'],
            ['positionSaturday'=>'26','positionSunday'=>'44','name'=>'CONJUNTO FOLKLORICO KORY MAJTAS CENTRAL', 'imagen'=>'zamponeros.png'],
            ['positionSaturday'=>'27','positionSunday'=>'1','name'=>'DIABLADA FERROVIARIA ', 'imagen'=>'diablada.png'],
            ['positionSaturday'=>'28','positionSunday'=>'2','name'=>'FRAT. REYES MORENOS FERRARI GHEZZI', 'imagen'=>'morenada.png'],
            ['positionSaturday'=>'29','positionSunday'=>'3','name'=>'CAPORALES REYES DE LA TUNTUNA ENAF', 'imagen'=>'caporales.png'],
            ['positionSaturday'=>'30','positionSunday'=>'4','name'=>'CONJUNTO TINKU LOS JAIRAS DE ORURO', 'imagen'=>'tinkus.png'],
            ['positionSaturday'=>'31','positionSunday'=>'5','name'=>'FRAT. CULLAGUADA TERRIBLES QUIRQUINCHOS', 'imagen'=>'cullaguada.png'],
            ['positionSaturday'=>'32','positionSunday'=>'6','name'=>'FRATERNIDAD KALLAWAYAS BOLIVIA', 'imagen'=>'antawaras.png'],
            ['positionSaturday'=>'33','positionSunday'=>'7','name'=>'CONJ. POTOLOS JHILANCOS CHAYANTA', 'imagen'=>'potolos.png'],
            ['positionSaturday'=>'34','positionSunday'=>'8','name'=>'CONJUNTO FOLKLORICO Y CULTURAL DOCTORCITOS ITOS', 'imagen'=>'doctorcitos.png'],
            ['positionSaturday'=>'35','positionSunday'=>'9','name'=>'FRATERNIDAD DE DANZA ESTILIZADA INTI LLAJTA', 'imagen'=>'antawaras.png'],
            ['positionSaturday'=>'36','positionSunday'=>'45','name'=>'DIABLADA ARTISTICA URUS', 'imagen'=>'diablada.png'],
            ['positionSaturday'=>'37','positionSunday'=>'46','name'=>'FRATERNIDAD CULTURAL REYES MORENOS COMIBOL', 'imagen'=>'morenada.png'],
            ['positionSaturday'=>'38','positionSunday'=>'47','name'=>'CONJUNTO ARTISTICO Y CULTURAL TOBAS URU URU', 'imagen'=>'tobas.png'],
            ['positionSaturday'=>'39','positionSunday'=>'48','name'=>'FRAT. FOLK. CULT. CAPORALES UNIV. SAN SIMÓN', 'imagen'=>'caporales.png'],
            ['positionSaturday'=>'40','positionSunday'=>'49','name'=>'CONJUNTO AUTOCTONO WITITIS', 'imagen'=>'wititis.png'],
            ['positionSaturday'=>'41','positionSunday'=>'50','name'=>'CONJUNTO TINKUS HUAJCHAS', 'imagen'=>'tinkus.png'],
            ['positionSaturday'=>'42','positionSunday'=>'51','name'=>'INCAS KOLLASUYO HIJOS DEL SOCAVON', 'imagen'=>'incas.png'],
            ['positionSaturday'=>'43','positionSunday'=>'52','name'=>'TARQUEADA JATUN JALLPA', 'imagen'=>'antawaras.png'],
            ['positionSaturday'=>'44','positionSunday'=>'28','name'=>'FRATERNIDAD MORENADA METALURGICA ENAF', 'imagen'=>'morenada.png'],
            ['positionSaturday'=>'45','positionSunday'=>'29','name'=>'CENTRO CULTURAL RIKJCHARY LLAJTA', 'imagen'=>'antawaras.png'],
            ['positionSaturday'=>'46','positionSunday'=>'30','name'=>'CONJUNTO UNIVERSITARIO SURI', 'imagen'=>'surisicuri.png'],
            ['positionSaturday'=>'47','positionSunday'=>'31','name'=>'CONJUNTO KANTUS SARTAÑANI', 'imagen'=>'kantus.png'],
            ['positionSaturday'=>'48','positionSunday'=>'32','name'=>'FRATERNIDAD CAPORALES C.B.N.', 'imagen'=>'caporales.png'],
            ['positionSaturday'=>'49','positionSunday'=>'33','name'=>'GRUPO CULTURAL AUTOCTONO SUMAJ PUNCHAY', 'imagen'=>'antawaras.png'],
            ['positionSaturday'=>'50','positionSunday'=>'34','name'=>'FRAT. CULTURAL TINKUS BOLIVIA (AYLLU LLAJWAS)', 'imagen'=>'tinkus.png'],
            ['positionSaturday'=>'51','positionSunday'=>'35','name'=>'FRAT. FOLK. ARTÍSTICA Y CULTURAL PHUJLLAY', 'imagen'=>'pujllay.png'],
            ['positionSaturday'=>'52','positionSunday'=>'36','name'=>'FRAT. ARTÍSTICA Y CULTURAL LA DIABLADA', 'imagen'=>'diablada.png'],
        ]);
    }
}
