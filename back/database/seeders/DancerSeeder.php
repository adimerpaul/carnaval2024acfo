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
//        DB::table('dancers')->insert([
////            ['positionSaturday'=>'1','positionSunday'=>'10','name'=>'GRAN TRADICIONAL AUTENTICA DIABLADA ORURO', 'imagen'=>'diablada.png'],
////            ['positionSaturday'=>'2','positionSunday'=>'11','name'=>'FRATERNIDAD HIJOS DEL SOL LOS INCAS', 'imagen'=>'incas.png'],
////            ['positionSaturday'=>'3','positionSunday'=>'12','name'=>'CONJUNTO FOLKLORICO MORENADA ZONA NORTE', 'imagen'=>'morenada.png'],
////            ['positionSaturday'=>'4','positionSunday'=>'13','name'=>'FRAT. ARTISTICA ZAMPOÑEROS HIJOS DEL PAGADOR', 'imagen'=>'zamponeros.png'],
////            ['positionSaturday'=>'5','positionSunday'=>'14','name'=>'CENTRO TRADICIONAL NEGRITOS DE PAGADOR', 'imagen'=>'negritos.png'],
////            ['positionSaturday'=>'6','positionSunday'=>'15','name'=>'CONJUNTO FOLKLORICO AHUATIRIS', 'imagen'=>'antawaras.png'],
////            ['positionSaturday'=>'7','positionSunday'=>'16','name'=>'CONJUNTO WACA WACAS SAN AGUSTIN DERECHO', 'imagen'=>'wacatoncoris.png'],
////            ['positionSaturday'=>'8','positionSunday'=>'17','name'=>'FRATERNIDAD MORENADA CENTRAL ORURO', 'imagen'=>'morenadafull.png'],
////            ['positionSaturday'=>'9','positionSunday'=>'18','name'=>'CONJUNTO CAPORALES INFANTILES IGNACIO LEON', 'imagen'=>'caporales.png'],
////            ['positionSaturday'=>'10','positionSunday'=>'19','name'=>'CONJUNTO TRADICIONAL FOLKLORICO DIABLADA ORURO', 'imagen'=>'diablada.png'],
////            ['positionSaturday'=>'11','positionSunday'=>'20','name'=>'CONJUNTO TRADICIONAL LLAMERADA ZONA NORTE ORURO', 'imagen'=>'llamerada.png'],
////            ['positionSaturday'=>'12','positionSunday'=>'21','name'=>'FRATERNIDAD CAPORALES CENTRALISTAS', 'imagen'=>'caporales.png'],
////            ['positionSaturday'=>'13','positionSunday'=>'22','name'=>'FRAT. MORENADA CENTRAL FDDA. COM, COCANI', 'imagen'=>'morenada.png'],
////            ['positionSaturday'=>'14','positionSunday'=>'23','name'=>'CONJUNTO FOLKLORICO TOBAS ZONA SUD', 'imagen'=>'tobas.png'],
////            ['positionSaturday'=>'15','positionSunday'=>'24','name'=>'CONJUNTO NEGRITOS UNIDOS DE LA SAYA', 'imagen'=>'negritos.png'],
////            ['positionSaturday'=>'16','positionSunday'=>'25','name'=>'CONJUNTO WACATOCORIS URUS', 'imagen'=>'wacatoncoris.png'],
////            ['positionSaturday'=>'17','positionSunday'=>'26','name'=>'CONJUNTO FOLKLORICO ANTAWARA', 'imagen'=>'antawaras.png'],
////            ['positionSaturday'=>'18','positionSunday'=>'27','name'=>'CONJUNTO TINKUS LOS TOLKAS', 'imagen'=>'tinkus.png'],
////            ['positionSaturday'=>'19','positionSunday'=>'37','name'=>'CONJUNTO MORENADA MEJILLONES', 'imagen'=>'morenada.png'],
////            ['positionSaturday'=>'20','positionSunday'=>'38','name'=>'FRATERNIDAD FOLKLORICA LLAMERADA SOCAVÓN', 'imagen'=>'llamerada.png'],
////            ['positionSaturday'=>'21','positionSunday'=>'39','name'=>'CONJUNTO FOLK. Y CULTURAL PHUJLLAY ORURO', 'imagen'=>'pujllay.png'],
////            ['positionSaturday'=>'22','positionSunday'=>'40','name'=>'GRUPO DE DANZA ESTILIZADA SURI SICURI', 'imagen'=>'surisicuri.png'],
////            ['positionSaturday'=>'23','positionSunday'=>'41','name'=>'CONJUNTO FOLKLORICO SAMBOS CAPORALES', 'imagen'=>'caporales.png'],
////            ['positionSaturday'=>'24','positionSunday'=>'42','name'=>'FRATERNIDAD CULLAGUADA ORURO', 'imagen'=>'cullaguada.png'],
////            ['positionSaturday'=>'25','positionSunday'=>'43','name'=>'CONJUNTO TRADICIONAL TOBAS ZONA CENTRAL', 'imagen'=>'tobas.png'],
////            ['positionSaturday'=>'26','positionSunday'=>'44','name'=>'CONJUNTO FOLKLORICO KORY MAJTAS CENTRAL', 'imagen'=>'zamponeros.png'],
////            ['positionSaturday'=>'27','positionSunday'=>'1','name'=>'DIABLADA FERROVIARIA ', 'imagen'=>'diablada.png'],
////            ['positionSaturday'=>'28','positionSunday'=>'2','name'=>'FRAT. REYES MORENOS FERRARI GHEZZI', 'imagen'=>'morenada.png'],
////            ['positionSaturday'=>'29','positionSunday'=>'3','name'=>'CAPORALES REYES DE LA TUNTUNA ENAF', 'imagen'=>'caporales.png'],
////            ['positionSaturday'=>'30','positionSunday'=>'4','name'=>'CONJUNTO TINKU LOS JAIRAS DE ORURO', 'imagen'=>'tinkus.png'],
////            ['positionSaturday'=>'31','positionSunday'=>'5','name'=>'FRAT. CULLAGUADA TERRIBLES QUIRQUINCHOS', 'imagen'=>'cullaguada.png'],
////            ['positionSaturday'=>'32','positionSunday'=>'6','name'=>'FRATERNIDAD KALLAWAYAS BOLIVIA', 'imagen'=>'antawaras.png'],
////            ['positionSaturday'=>'33','positionSunday'=>'7','name'=>'CONJ. POTOLOS JHILANCOS CHAYANTA', 'imagen'=>'potolos.png'],
////            ['positionSaturday'=>'34','positionSunday'=>'8','name'=>'CONJUNTO FOLKLORICO Y CULTURAL DOCTORCITOS ITOS', 'imagen'=>'doctorcitos.png'],
////            ['positionSaturday'=>'35','positionSunday'=>'9','name'=>'FRATERNIDAD DE DANZA ESTILIZADA INTI LLAJTA', 'imagen'=>'antawaras.png'],
////            ['positionSaturday'=>'36','positionSunday'=>'45','name'=>'DIABLADA ARTISTICA URUS', 'imagen'=>'diablada.png'],
////            ['positionSaturday'=>'37','positionSunday'=>'46','name'=>'FRATERNIDAD CULTURAL REYES MORENOS COMIBOL', 'imagen'=>'morenada.png'],
////            ['positionSaturday'=>'38','positionSunday'=>'47','name'=>'CONJUNTO ARTISTICO Y CULTURAL TOBAS URU URU', 'imagen'=>'tobas.png'],
////            ['positionSaturday'=>'39','positionSunday'=>'48','name'=>'FRAT. FOLK. CULT. CAPORALES UNIV. SAN SIMÓN', 'imagen'=>'caporales.png'],
////            ['positionSaturday'=>'40','positionSunday'=>'49','name'=>'CONJUNTO AUTOCTONO WITITIS', 'imagen'=>'wititis.png'],
////            ['positionSaturday'=>'41','positionSunday'=>'50','name'=>'CONJUNTO TINKUS HUAJCHAS', 'imagen'=>'tinkus.png'],
////            ['positionSaturday'=>'42','positionSunday'=>'51','name'=>'INCAS KOLLASUYO HIJOS DEL SOCAVON', 'imagen'=>'incas.png'],
////            ['positionSaturday'=>'43','positionSunday'=>'52','name'=>'TARQUEADA JATUN JALLPA', 'imagen'=>'antawaras.png'],
////            ['positionSaturday'=>'44','positionSunday'=>'28','name'=>'FRATERNIDAD MORENADA METALURGICA ENAF', 'imagen'=>'morenada.png'],
////            ['positionSaturday'=>'45','positionSunday'=>'29','name'=>'CENTRO CULTURAL RIKJCHARY LLAJTA', 'imagen'=>'antawaras.png'],
////            ['positionSaturday'=>'46','positionSunday'=>'30','name'=>'CONJUNTO UNIVERSITARIO SURI', 'imagen'=>'surisicuri.png'],
////            ['positionSaturday'=>'47','positionSunday'=>'31','name'=>'CONJUNTO KANTUS SARTAÑANI', 'imagen'=>'kantus.png'],
////            ['positionSaturday'=>'48','positionSunday'=>'32','name'=>'FRATERNIDAD CAPORALES C.B.N.', 'imagen'=>'caporales.png'],
////            ['positionSaturday'=>'49','positionSunday'=>'33','name'=>'GRUPO CULTURAL AUTOCTONO SUMAJ PUNCHAY', 'imagen'=>'antawaras.png'],
////            ['positionSaturday'=>'50','positionSunday'=>'34','name'=>'FRAT. CULTURAL TINKUS BOLIVIA (AYLLU LLAJWAS)', 'imagen'=>'tinkus.png'],
////            ['positionSaturday'=>'51','positionSunday'=>'35','name'=>'FRAT. FOLK. ARTÍSTICA Y CULTURAL PHUJLLAY', 'imagen'=>'pujllay.png'],
////            ['positionSaturday'=>'52','positionSunday'=>'36','name'=>'FRAT. ARTÍSTICA Y CULTURAL LA DIABLADA', 'imagen'=>'diablada.png'],
////            ['positionSaturday'=>'53','positionSunday'=>'17','name'=>'INICIO', 'imagen'=>'morenadafull.png'],
////            ['positionSaturday'=>'54','positionSunday'=>'17','name'=>'FIN', 'imagen'=>'morenadafull.png'],
////            ['positionSaturday'=>'55','positionSunday'=>'17','name'=>'BANDA POOPO', 'imagen'=>'poopo.png'],
////            ['positionSaturday'=>'56','positionSunday'=>'17','name'=>'BANDA PAGADOR', 'imagen'=>'pagador.png'],
////            ['positionSaturday'=>'57','positionSunday'=>'17','name'=>'BANDA BOLIVIA', 'imagen'=>'bolivia.png'],
////            ['positionSaturday'=>'58','positionSunday'=>'17','name'=>'BANDA REAL', 'imagen'=>'real.png'],
////            INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(1, 'GRAN TRADICIONAL AUTENTICA DIABLADA ORURO', 'diablada.png', '0', '0', 'xsgnY8oCkcU', 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.', 1, 10, NULL, '2025-03-02 22:13:19.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(2, 'FRATERNIDAD HIJOS DEL SOL LOS INCAS', 'incas.png', '0', '0', 'PqXnsNsl7wE', 'Los Incas es una danza que rinde homenaje a la civilización Inca, mostrando su grandeza y tradiciones.', 2, 11, NULL, '2025-03-02 22:29:13.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(3, 'CONJUNTO FOLKLORICO MORENADA ZONA NORTE', 'morenada.png', '0', '0', 'HJEhul_lW44', 'La Morenada es una danza satírica que representa a los esclavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.', 3, 12, NULL, '2025-03-02 22:58:10.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(4, 'FRAT. ARTISTICA ZAMPOÑEROS HIJOS DEL PAGADOR', 'zamponeros.png', '0', '0', 'xsgnY8oCkcU', 'La Zampoñada es una expresión musical y dancística andina, donde se tocan las tradicionales zampoñas en conjunto.', 4, 13, NULL, '2025-03-02 23:09:48.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(5, 'CENTRO TRADICIONAL NEGRITOS DE PAGADOR', 'negritos.png', '0', '0', 'mdwBzMiMt3E', 'La danza de los Negritos es una de las más antiguas de Bolivia, representando la resistencia y cultura afroboliviana.', 5, 14, NULL, '2025-03-02 23:26:12.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(6, 'CONJUNTO FOLKLORICO AHUATIRIS', 'antawaras.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 6, 15, NULL, '2025-03-02 23:33:56.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(7, 'CONJUNTO WACA WACAS SAN AGUSTIN DERECHO', 'wacatoncoris.png', '0', '0', 'lp3TorUaM0U', 'La danza Waca Wacas satiriza las corridas de toros introducidas en Bolivia durante la colonia.', 7, 16, NULL, '2025-03-02 23:43:46.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(8, 'FRATERNIDAD MORENADA CENTRAL ORURO', 'morenadafull.png', '0', '0', 'HJEhul_lW44', 'La Morenada es una danza satírica que representa a los esclavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.', 8, 17, NULL, '2025-03-03 01:25:19.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(9, 'CONJUNTO CAPORALES INFANTILES IGNACIO LEON', 'caporales.png', '0', '0', 'WxbjPjaU7tY', 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.', 9, 18, NULL, '2025-03-03 01:17:35.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(10, 'CONJUNTO TRADICIONAL FOLKLORICO DIABLADA ORURO', 'diablada.png', '0', '0', 'xsgnY8oCkcU', 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.', 10, 19, NULL, '2025-03-02 14:55:36.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(11, 'CONJUNTO TRADICIONAL LLAMERADA ZONA NORTE ORURO', 'llamerada.png', '0', '0', 'fHwQvWDgFKo', 'Los Llameradas son una danza tradicional que rinde homenaje a los pastores de llamas, quienes fueron fundamentales en la economía andina.', 11, 20, NULL, '2025-03-02 16:04:02.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(12, 'FRATERNIDAD CAPORALES CENTRALISTAS', 'caporales.png', '0', '0', 'WxbjPjaU7tY', 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.', 12, 21, NULL, '2025-03-02 16:27:42.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(13, 'FRAT. MORENADA CENTRAL FDDA. COM, COCANI', 'morenada.png', '0', '0', 'HJEhul_lW44', 'La Morenada es una danza satírica que representa a los esclavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.', 13, 22, NULL, '2025-03-03 02:55:19.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(14, 'CONJUNTO FOLKLORICO TOBAS ZONA SUD', 'tobas.png', '0', '0', 'NZr4h89n4QI', 'Los Tobas es una danza guerrera que representa a los pueblos indígenas del oriente boliviano.', 14, 23, NULL, '2025-03-02 16:42:42.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(15, 'CONJUNTO NEGRITOS UNIDOS DE LA SAYA', 'negritos.png', '0', '0', 'mdwBzMiMt3E', 'La danza de los Negritos es una de las más antiguas de Bolivia, representando la resistencia y cultura afroboliviana.', 15, 24, NULL, '2025-03-02 16:50:02.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(16, 'CONJUNTO WACATOCORIS URUS', 'wacatoncoris.png', '0', '0', 'lp3TorUaM0U', 'La danza Waca Wacas satiriza las corridas de toros introducidas en Bolivia durante la colonia.', 16, 25, NULL, '2025-03-02 17:21:09.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(17, 'CONJUNTO FOLKLORICO ANTAWARA', 'antawaras.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 17, 26, NULL, '2025-03-02 17:25:00.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(18, 'CONJUNTO TINKUS LOS TOLKAS', 'tinkus.png', '0', '0', 'ACBFzs6ISHE', 'El Tinku es una danza de origen ritual que simboliza los combates festivos de los pueblos andinos.', 18, 27, NULL, '2025-03-02 17:51:20.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(19, 'CONJUNTO MORENADA MEJILLONES', 'morenada.png', '0', '0', 'HJEhul_lW44', 'La Morenada es una danza satírica que representa a los esclavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.', 19, 37, NULL, '2025-03-02 18:29:24.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(20, 'FRATERNIDAD FOLKLORICA LLAMERADA SOCAVÓN', 'llamerada.png', '0', '0', 'fHwQvWDgFKo', 'Los Llameradas son una danza tradicional que rinde homenaje a los pastores de llamas, quienes fueron fundamentales en la economía andina.', 20, 38, NULL, '2025-03-02 18:54:36.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(21, 'CONJUNTO FOLK. Y CULTURAL PHUJLLAY ORURO', 'pujllay.png', '0', '0', 'ipOU_BKKDic', 'El Phujllay es una danza tradicional de los valles bolivianos, que celebra las cosechas y los ciclos agrícolas.', 21, 39, NULL, '2025-03-02 19:11:16.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(22, 'GRUPO DE DANZA ESTILIZADA SURI SICURI', 'surisicuri.png', '0', '0', 'E4GMbAyL9A8', 'El Suri Sicuri es una danza de origen Aymara que imita el movimiento del ave Suri, con sus vistosas plumas y pasos rítmicos.', 22, 40, NULL, '2025-03-01 23:26:40.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(23, 'CONJUNTO FOLKLORICO SAMBOS CAPORALES', 'caporales.png', '0', '0', 'WxbjPjaU7tY', 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.', 23, 41, NULL, '2025-03-02 19:51:38.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(24, 'FRATERNIDAD CULLAGUADA ORURO', 'cullaguada.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 24, 42, NULL, '2025-03-02 20:23:12.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(25, 'CONJUNTO TRADICIONAL TOBAS ZONA CENTRAL', 'tobas.png', '0', '0', 'NZr4h89n4QI', 'Los Tobas es una danza guerrera que representa a los pueblos indígenas del oriente boliviano.', 25, 43, NULL, '2025-03-02 20:47:03.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(26, 'CONJUNTO FOLKLORICO KORY MAJTAS CENTRAL', 'zamponeros.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 26, 44, NULL, '2025-03-02 21:03:11.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(27, 'DIABLADA FERROVIARIA ', 'diablada.png', '0', '0', 'xsgnY8oCkcU', 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.', 27, 1, NULL, '2025-03-03 04:24:20.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(28, 'FRAT. REYES MORENOS FERRARI GHEZZI', 'morenada.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 28, 2, NULL, '2025-03-03 05:04:34.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(29, 'CAPORALES REYES DE LA TUNTUNA ENAF', 'caporales.png', '0', '0', 'WxbjPjaU7tY', 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.', 29, 3, NULL, '2025-03-03 05:28:41.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(30, 'CONJUNTO TINKU LOS JAIRAS DE ORURO', 'tinkus.png', '0', '0', 'ACBFzs6ISHE', 'El Tinku es una danza de origen ritual que simboliza los combates festivos de los pueblos andinos.', 30, 4, NULL, '2025-03-03 06:03:02.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(31, 'FRAT. CULLAGUADA TERRIBLES QUIRQUINCHOS', 'cullaguada.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 31, 5, NULL, '2025-03-03 06:21:11.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(32, 'FRATERNIDAD KALLAWAYAS BOLIVIA', 'antawaras.png', '0', '0', '1N2-S_bjc_s', 'Los Kallawayas representan a los médicos tradicionales andinos, conocidos por sus conocimientos en hierbas medicinales.', 32, 6, NULL, '2025-03-03 06:25:09.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(33, 'CONJ. POTOLOS JHILANCOS CHAYANTA', 'potolos.png', '0', '0', 'yrCTi8oS6M4', 'Los Potolos es una danza autóctona que representa a los pobladores del norte de Potosí con sus movimientos pausados y trajes coloridos.', 33, 7, NULL, '2025-03-03 06:39:30.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(34, 'CONJUNTO FOLKLORICO Y CULTURAL DOCTORCITOS ITOS', 'doctorcitos.png', '0', '0', 'ADgl0OPWmYo', 'Los Doctorcitos es una danza satírica que parodia a los abogados y jueces de la época colonial.', 34, 8, NULL, '2025-03-03 06:45:13.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(35, 'FRATERNIDAD DE DANZA ESTILIZADA INTI LLAJTA', 'antawaras.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 35, 9, NULL, '2025-03-03 06:56:24.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(36, 'DIABLADA ARTISTICA URUS', 'diablada.png', '0', '0', 'xsgnY8oCkcU', 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.', 36, 45, NULL, '2025-03-03 07:31:39.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(37, 'FRATERNIDAD CULTURAL REYES MORENOS COMIBOL', 'morenada.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 37, 46, NULL, '2025-03-03 07:42:11.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(38, 'CONJUNTO ARTISTICO Y CULTURAL TOBAS URU URU', 'tobas.png', '0', '0', 'NZr4h89n4QI', 'Los Tobas es una danza guerrera que representa a los pueblos indígenas del oriente boliviano.', 38, 47, NULL, '2025-03-03 07:53:24.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(39, 'FRAT. FOLK. CULT. CAPORALES UNIV. SAN SIMÓN', 'caporales.png', '0', '0', 'WxbjPjaU7tY', 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.', 39, 48, NULL, '2025-03-03 08:47:29.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(40, 'CONJUNTO AUTOCTONO WITITIS', 'wititis.png', '0', '0', 'oTT46NLyNhc', 'El Wititi es una danza festiva que celebra la vida en los valles andinos con sus coloridos trajes y movimientos circulares.', 40, 49, NULL, '2025-03-03 09:06:22.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(41, 'CONJUNTO TINKUS HUAJCHAS', 'tinkus.png', '0', '0', 'ACBFzs6ISHE', 'El Tinku es una danza de origen ritual que simboliza los combates festivos de los pueblos andinos.', 41, 50, NULL, '2025-03-02 09:00:55.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(42, 'INCAS KOLLASUYO HIJOS DEL SOCAVON', 'incas.png', '0', '0', 'SbL7ezF25GY', 'Los Incas Kollasuyo representan la grandeza del imperio incaico, fusionando sus danzas con la cultura boliviana.', 42, 51, NULL, '2025-03-03 09:16:27.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(43, 'TARQUEADA JATUN JALLPA', 'antawaras.png', '-17.96716539529758', '-67.11845583617907', 'Ytw6cnZWkyE', 'La Tarqueada es una danza autóctona que se caracteriza por el uso de la tarka, un instrumento de viento de madera típico de los Andes.', 43, 52, NULL, '2025-03-03 06:43:08.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(44, 'FRATERNIDAD MORENADA METALURGICA ENAF', 'morenada.png', '0', '0', 'HJEhul_lW44', 'La Morenada es una danza satírica que representa a los esclavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.', 44, 28, NULL, '2025-03-03 01:29:26.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(45, 'CENTRO CULTURAL RIKJCHARY LLAJTA', 'antawaras.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 45, 29, NULL, '2025-03-03 01:34:18.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(46, 'CONJUNTO UNIVERSITARIO SURI', 'surisicuri.png', '0', '0', 'W4s7d_4Erwo', 'No hay historia', 46, 30, NULL, '2025-03-03 01:41:38.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(47, 'CONJUNTO KANTUS SARTAÑANI', 'kantus.png', '0', '0', 'FV_ug5pZRpk', 'Los Kantus es una danza y género musical Aymara que acompaña las ceremonias religiosas y agrícolas en el altiplano.', 47, 31, NULL, '2025-03-03 03:00:37.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(48, 'FRATERNIDAD CAPORALES C.B.N.', 'caporales.png', '0', '0', 'WxbjPjaU7tY', 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.', 48, 32, NULL, '2025-03-03 03:18:30.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(49, 'GRUPO CULTURAL AUTOCTONO SUMAJ PUNCHAY', 'antawaras.png', '0', '0', 'TFgcY_-mALA', 'El grupo Sumaj Punchay representa la esencia de las danzas autóctonas, preservando las tradiciones de los pueblos originarios.', 49, 33, NULL, '2025-03-03 03:31:37.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(50, 'FRAT. CULTURAL TINKUS BOLIVIA (AYLLU LLAJWAS)', 'tinkus.png', '0', '0', 'ACBFzs6ISHE', 'El Tinku es una danza de origen ritual que simboliza los combates festivos de los pueblos andinos.', 50, 34, NULL, '2025-03-03 03:45:16.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(51, 'FRAT. FOLK. ARTÍSTICA Y CULTURAL PHUJLLAY', 'pujllay.png', '0', '0', 'ipOU_BKKDic', 'El Phujllay es una danza tradicional de los valles bolivianos, que celebra las cosechas y los ciclos agrícolas.', 51, 35, NULL, '2025-03-03 03:52:34.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(52, 'FRAT. ARTÍSTICA Y CULTURAL LA DIABLADA', 'diablada.png', '0', '0', 'xsgnY8oCkcU', 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.', 52, 36, NULL, '2025-03-02 18:08:25.000', '2025-03-03 09:23:25.000');
////INSERT INTO carnaval.dancers
////    (id, name, imagen, lat, lng, video, history, positionSaturday, positionSunday, created_at, updated_at, deleted_at)
////VALUES(59, 'WITITIS BELLAS ARTES', 'wititis.png', '0', '0', 'oTT46NLyNhc', 'El Wititi es una danza festiva que celebra la vida en los valles andinos con sus coloridos trajes y movimientos circulares.', 40, 49, NULL, '2025-02-24 06:36:27.000', '2025-03-03 09:23:25.000');
//        ]);
        DB::table('dancers')->insert([
            ['id' => 1, 'name' => 'GRAN TRADICIONAL AUTENTICA DIABLADA ORURO', 'imagen' => 'diablada.png', 'video' => 'xsgnY8oCkcU', 'history' => 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.'],
            ['id' => 2, 'name' => 'FRATERNIDAD HIJOS DEL SOL LOS INCAS', 'imagen' => 'incas.png', 'video' => 'SbL7ezF25GY', 'history' => 'Los Incas Kollasuyo representan la grandeza del imperio incaico, fusionando sus danzas con la cultura boliviana.'],
            ['id' => 3, 'name' => 'CONJUNTO FOLKLORICO MORENADA ZONA NORTE', 'imagen' => 'morenada.png', 'video' => 'HJEhul_lW44', 'history' => 'La Morenada es una danza satírica que representa a los esclavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.'],
            ['id' => 4, 'name' => 'FRAT. ARTISTICA ZAMPOÑEROS HIJOS DEL PAGADOR', 'imagen' => 'zamponeros.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 5, 'name' => 'CENTRO TRADICIONAL NEGRITOS DE PAGADOR', 'imagen' => 'negritos.png', 'video' => 'mdwBzMiMt3E', 'history' => 'La danza de los Negritos es una de las más antiguas de Bolivia, representando la resistencia y cultura afroboliviana.'],
            ['id' => 6, 'name' => 'CONJUNTO FOLKLORICO ANTAWARA', 'imagen' => 'antawaras.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 7, 'name' => 'CONJUNTO WACA WACAS SAN AGUSTIN DERECHO', 'imagen' => 'wacatoncoris.png', 'video' => 'lp3TorUaM0U', 'history' => 'La danza Waca Wacas satiriza las corridas de toros introducidas en Bolivia durante la colonia.'],
            ['id' => 8, 'name' => 'FRATERNIDAD MORENADA CENTRAL ORURO', 'imagen' => 'morenadafull.png', 'video' => 'HJEhul_lW44', 'history' => 'La Morenada es una danza satírica que representa a los esclavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.'],
            ['id' => 9, 'name' => 'CONJUNTO CAPORALES INFANTILES IGNACIO LEON', 'imagen' => 'caporales.png', 'video' => 'WxbjPjaU7tY', 'history' => 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.'],
            ['id' => 10, 'name' => 'CONJUNTO TRADICIONAL FOLKLORICO DIABLADA ORURO', 'imagen' => 'diablada.png', 'video' => 'xsgnY8oCkcU', 'history' => 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.'],
            ['id' => 11, 'name' => 'CONJUNTO TRADICIONAL LLAMERADA ZONA NORTE ORURO', 'imagen' => 'llamerada.png', 'video' => 'fHwQvWDgFKo', 'history' => 'Los Llameradas son una danza tradicional que rinde homenaje a los pastores de llamas, quienes fueron fundamentales en la economía andina.'],
            ['id' => 12, 'name' => 'FRATERNIDAD CAPORALES CENTRALISTAS', 'imagen' => 'caporales.png', 'video' => 'WxbjPjaU7tY', 'history' => 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.'],
            ['id' => 13, 'name' => 'FRAT. MORENADA CENTRAL FDDA. COM, COCANI', 'imagen' => 'morenada.png', 'video' => 'HJEhul_lW44', 'history' => 'La Morenada es una danza satírica que representa a los esclavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.'],
            ['id' => 14, 'name' => 'CONJUNTO FOLKLORICO TOBAS ZONA SUD', 'imagen' => 'tobas.png', 'video' => 'NZr4h89n4QI', 'history' => 'Los Tobas es una danza guerrera que representa a los pueblos indígenas del oriente boliviano.'],
            ['id' => 15, 'name' => 'CONJUNTO NEGRITOS UNIDOS DE LA SAYA', 'imagen' => 'negritos.png', 'video' => 'mdwBzMiMt3E', 'history' => 'La danza de los Negritos es una de las más antiguas de Bolivia, representando la resistencia y cultura afroboliviana.'],
            ['id' => 16, 'name' => 'CONJUNTO WACATOCORIS URUS', 'imagen' => 'wacatoncoris.png', 'video' => 'lp3TorUaM0U', 'history' => 'La danza Waca Wacas satiriza las corridas de toros introducidas en Bolivia durante la colonia.'],
            ['id' => 17, 'name' => 'CONJUNTO FOLKLORICO ANTAWARA', 'imagen' => 'antawaras.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 18, 'name' => 'CONJUNTO TINKUS LOS TOLKAS', 'imagen' => 'tinkus.png', 'video' => 'ACBFzs6ISHE', 'history' => 'El Tinku es una danza de origen ritual que simboliza los combates festivos de los pueblos andinos.'],
            ['id' => 19, 'name' => 'CONJUNTO MORENADA MEJILLONES', 'imagen' => 'morenada.png', 'video' => 'HJEhul_lW44', 'history' => 'La Morenada es una danza satírica que representa a los es
clavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.'],
            ['id' => 20, 'name' => 'FRATERNIDAD FOLKLORICA LLAMERADA SOCAVÓN', 'imagen' => 'llamerada.png', 'video' => 'fHwQvWDgFKo', 'history' => 'Los Llameradas son una danza tradicional que rinde homenaje a los pastores de llamas, quienes fueron fundamentales en la economía andina.'],
            ['id' => 21, 'name' => 'CONJUNTO FOLK. Y CULTURAL PHUJLLAY ORURO', 'imagen' => 'pujllay.png', 'video' => 'ipOU_BKKDic', 'history' => 'El Phujllay es una danza tradicional de los valles bolivianos, que celebra las cosechas y los ciclos agrícolas.'],
            ['id' => 22, 'name' => 'GRUPO DE DANZA ESTILIZADA SURI SICURI', 'imagen' => 'surisicuri.png', 'video' => 'E4GMbAyL9A8', 'history' => 'El Suri Sicuri es una danza de origen Aymara que imita el movimiento del ave Suri, con sus vistosas plumas y pasos rítmicos.'],
            ['id' => 23, 'name' => 'CONJUNTO FOLKLORICO SAMBOS CAPORALES', 'imagen' => 'caporales.png', 'video' => 'WxbjPjaU7tY', 'history' => 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.'],
            ['id' => 24, 'name' => 'FRATERNIDAD CULLAGUADA ORURO', 'imagen' => 'cullaguada.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 25, 'name' => 'CONJUNTO TRADICIONAL TOBAS ZONA CENTRAL', 'imagen' => 'tobas.png', 'video' => 'NZr4h89n4QI', 'history' => 'Los Tobas es una danza guerrera que representa a los pueblos indígenas del oriente boliviano.'],
            ['id' => 26, 'name' => 'CONJUNTO FOLKLORICO KORY MAJTAS CENTRAL', 'imagen' => 'zamponeros.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 27, 'name' => 'DIABLADA FERROVIARIA', 'imagen' => 'diablada.png', 'video' => 'xsgnY8oCkcU', 'history' => 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.'],
            ['id' => 28, 'name' => 'FRAT. REYES MORENOS FERRARI GHEZZI', 'imagen' => 'morenada.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 29, 'name' => 'CAPORALES REYES DE LA TUNTUNA ENAF', 'imagen' => 'caporales.png', 'video' => 'WxbjPjaU7tY', 'history' => 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.'],
            ['id' => 30, 'name' => 'CONJUNTO TINKU LOS JAIRAS DE ORURO', 'imagen' => 'tinkus.png', 'video' => 'ACBFzs6ISHE', 'history' => 'El Tinku es una danza de origen ritual que simboliza los combates festivos de los pueblos andinos.'],
            ['id' => 31, 'name' => 'FRAT. CULLAGUADA TERRIBLES QUIRQUINCHOS', 'imagen' => 'cullaguada.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 32, 'name' => 'FRATERNIDAD KALLAWAYAS BOLIVIA', 'imagen' => 'antawaras.png', 'video' => '1N2-S_bjc_s', 'history' => 'Los Kallawayas representan a los médicos tradicionales andinos, conocidos por sus conocimientos en hierbas medicinales.'],
            ['id' => 33, 'name' => 'CONJ. POTOLOS JHILANCOS CHAYANTA', 'imagen' => 'potolos.png', 'video' => 'yrCTi8oS6M4', 'history' => 'Los Potolos es una danza autóctona que representa a los pobladores del norte de Potosí con sus movimientos pausados y trajes coloridos.'],
            ['id' => 34, 'name' => 'CONJUNTO FOLKLORICO Y CULTURAL DOCTORCITOS ITOS', 'imagen' => 'doctorcitos.png', 'video' => 'ADgl0OPWmYo', 'history' => 'Los Doctorcitos es una danza satírica que parodia a los abogados y jueces de la época colonial.'],
            ['id' => 35, 'name' => 'FRATERNIDAD DE DANZA ESTILIZADA INTI LLAJTA', 'imagen' => 'antawaras.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 36, 'name' => 'DIABLADA ARTISTICA URUS', 'imagen' => 'diablada.png', 'video' => 'xsgnY8oCkcU', 'history' => 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.'],
            ['id' => 37, 'name' => 'FRATERNIDAD CULTURAL REYES MORENOS COMIBOL', 'imagen' => 'morenada.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 38, 'name' => 'CONJUNTO ARTISTICO Y CULTURAL TOBAS URU URU', 'imagen' => 'tobas.png', 'video' => 'NZr4h89n4QI', 'history' => 'Los Tobas es una danza guerrera que representa a los pueblos indígenas del oriente boliviano.'],
            ['id' => 39, 'name' => 'FRAT. FOLK. CULT. CAPORALES UNIV. SAN SIMÓN', 'imagen' => 'caporales.png', 'video' => 'WxbjPjaU7tY', 'history' => 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.'],
            ['id' => 40, 'name' => 'CONJUNTO AUTOCTONO WITITIS', 'imagen' => 'wititis.png', 'video' => 'oTT46NLyNhc', 'history' => 'El Wititi es una danza festiva que celebra la vida en los valles andinos con sus coloridos trajes y movimientos circulares.'],
            ['id' => 41, 'name' => 'CONJUNTO TINKUS HUAJCHAS', 'imagen' => 'tinkus.png', 'video' => 'ACBFzs6ISHE', 'history' => 'El Tinku es una danza de origen ritual que simboliza los combates festivos de los pueblos andinos.'],
            ['id' => 42, 'name' => 'INCAS KOLLASUYO HIJOS DEL SOCAVON', 'imagen' => 'incas.png', 'video' => 'SbL7ezF25GY', 'history' => 'Los Incas Kollasuyo representan la grandeza del imperio incaico, fusionando sus danzas con la cultura boliviana.'],
            ['id' => 43, 'name' => 'TARQUEADA JATUN JALLPA', 'imagen' => 'antawaras.png', 'lat' => '-17.96716539529758', 'lng' => '-67.11845583617907', 'video' => 'Ytw6cnZWkyE', 'history' => 'La Tarqueada es una danza autóctona que se caracteriza por el uso de la tarka, un instrumento de viento de madera típico de los Andes.'],
            ['id' => 44, 'name' => 'FRATERNIDAD MORENADA METALURGICA ENAF', 'imagen' => 'morenada.png', 'video' => 'HJEhul_lW44', 'history' => 'La Morenada es una danza satírica que representa a los esclavos africanos traídos a Bolivia en la colonia, con trajes pesados y movimientos pausados.'],
            ['id' => 45, 'name' => 'CENTRO CULTURAL RIKJCHARY LLAJTA', 'imagen' => 'antawaras.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 46, 'name' => 'CONJUNTO UNIVERSITARIO SURI', 'imagen' => 'surisicuri.png', 'video' => 'W4s7d_4Erwo', 'history' => 'No hay historia'],
            ['id' => 47, 'name' => 'CONJUNTO KANTUS SARTAÑANI', 'imagen' => 'kantus.png', 'video' => 'FV_ug5pZRpk', 'history' => 'Los Kantus es una danza y género musical Aymara que acompaña las ceremonias religiosas y agrícolas en el altiplano'],
            ['id' => 48, 'name' => 'FRATERNIDAD CAPORALES C.B.N.', 'imagen' => 'caporales.png', 'video' => 'WxbjPjaU7tY', 'history' => 'Los Caporales son una danza vibrante que representa la figura de los capataces mestizos en la colonia, con movimientos enérgicos.'],
            ['id' => 49, 'name' => 'GRUPO CULTURAL AUTOCTONO SUMAJ PUNCHAY', 'imagen' => 'antawaras.png', 'video' => 'TFgcY_-mALA', 'history' => 'El grupo Sumaj Punchay representa la esencia de las danzas autóctonas, preservando las tradiciones de los pueblos originarios.'],
            ['id' => 50, 'name' => 'FRAT. CULTURAL TINKUS BOLIVIA (AYLLU LLAJWAS)', 'imagen' => 'tinkus.png', 'video' => 'ACBFzs6ISHE', 'history' => 'El Tinku es una danza de origen ritual que simboliza los combates festivos de los pueblos andinos.'],
            ['id' => 51, 'name' => 'FRAT. FOLK. ARTÍSTICA Y CULTURAL PHUJLLAY', 'imagen' => 'pujllay.png', 'video' => 'ipOU_BKKDic', 'history' => 'El Phujllay es una danza tradicional de los valles bolivianos, que celebra las cosechas y los ciclos agrícolas.'],
            ['id' => 52, 'name' => 'FRAT. ARTÍSTICA Y CULTURAL LA DIABLADA', 'imagen' => 'diablada.png', 'video' => 'xsgnY8oCkcU', 'history' => 'La Diablada es una de las danzas más emblemáticas de Bolivia, representando la lucha entre el bien y el mal con impresionantes trajes y máscaras.'],
            ['id' => 59, 'name' => 'WITITIS BELLAS ARTES', 'imagen' => 'wititis.png', 'video' => 'oTT46NLyNhc', 'history' => 'El Wititi es una danza festiva que celebra la vida en los valles andinos con sus coloridos trajes y movimientos circulares.'],
        ]);
    }
}
