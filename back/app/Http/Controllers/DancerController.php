<?php

namespace App\Http\Controllers;

use App\Models\Cog;
use App\Models\Dancer;
use App\Http\Requests\StoreDancerRequest;
use App\Http\Requests\UpdateDancerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class DancerController extends Controller{
    //api.post('imagenes64', { nameImgenFaltantes }).then((res) => {
//    res.data.forEach((img) => {
//        const cacheKey = `image_${img.name}`
//            localStorage.setItem(cacheKey, img.image)
//            dancer.image = img.image
//          })
//        })
    public function imagenes64(Request $request) {
        // 1️⃣ Obtener solo los nombres de imágenes faltantes desde el frontend
        $imagenesFaltantes = $request->input('nameImgenFaltantes', []);

        if (empty($imagenesFaltantes)) {
            return response()->json([], 200);
        }

        // 2️⃣ Buscar solo los bailarines con esas imágenes
        $dancers = Dancer::whereIn('imagen', $imagenesFaltantes)->get();

        // 3️⃣ Convertir imágenes a base64
        $imagenesBase64 = [];

        foreach ($dancers as $dancer) {
            $imagePath = public_path('uploads/' . $dancer->imagen);

            if (file_exists($imagePath)) {
                $imageData = file_get_contents($imagePath);
                $base64Image = base64_encode($imageData);
                $imagenesBase64[] = [
                    'name' => $dancer->imagen,
                    'image' => $base64Image
                ];
            }
        }

        // 4️⃣ Devolver solo las imágenes faltantes
        return response()->json($imagenesBase64, 200);
    }
    function base64($image){
        $imagePath = public_path('uploads/' . $image);
        if (file_exists($imagePath)) {
            $imageData = file_get_contents($imagePath);
            $base64Image = base64_encode($imageData);
            return $base64Image;
        }
        return '';
    }
    function show($id){
        $dancer = Dancer::find($id);
        $imagePath = public_path('uploads/' . $dancer->imagen);
        if (file_exists($imagePath)) {
            $imageData = file_get_contents($imagePath);
            $base64Image = base64_encode($imageData);
            $dancer->image = $base64Image;
        }
        return $dancer;
    }
    public function index(){
        $dancers = Dancer::all();
        $dancers->each(function($dancer){
            // Obtener la ruta de la imagen desde el directorio public
            $imagePath = public_path('uploads/' . $dancer->imagen);

            // Verificar si la imagen existe
            if (file_exists($imagePath)) {
                // Leer el contenido de la imagen y codificarlo en base64
                $imageData = file_get_contents($imagePath);
                $base64Image = base64_encode($imageData);

                // Establecer el atributo 'image' con la imagen en base64
                $dancer->image = $base64Image;
            }
        });
        $cog = Cog::find(1);
        $cog->value = $cog->value+1;
        $cog->save();
        return $dancers;
    }
    public function update(UpdateDancerRequest $request){
        $dancer = Dancer::find($request->id);
        $dancer->lat = $request->lat;
        $dancer->lng = $request->lng;
        $dancer->save();
//        error_log('dancer: ' . json_encode($dancer));

        $dancers = Dancer::where('lat', '!=', 0)->where('lng', '!=', 0)->get();
//        $dancers->each(function($dancer){
//            // Obtener la ruta de la imagen desde el directorio public
//            $imagePath = public_path('uploads/' . $dancer->imagen);
//
//            // Verificar si la imagen existe
//            if (file_exists($imagePath)) {
//                // Leer el contenido de la imagen y codificarlo en base64
//                $imageData = file_get_contents($imagePath);
//                $base64Image = base64_encode($imageData);
//
//                // Establecer el atributo 'image' con la imagen en base64
//                $dancer->image = $base64Image;
//            }
//        });
//        $dancersArray = $dancers->toArray();

//        $data = ['username' => 'my-user'];


        $this->soketIO('dance', $dancers->toArray());




        $user = User::where('id', $request->user()->id)->first();
//        error_log('user: ' . json_encode($user));
//        $timeNew = date('Y-m-d H:i:s');
//        $timeOld = $user->access;
        $user->access = date('Y-m-d H:i:s');
//        $user->time = $this->timeCalculate($timeNew, $timeOld);
        $user->save();
//        $dancers->each(function($dancer){
//            // Obtener la ruta de la imagen desde el directorio public
//            $imagePath = public_path('uploads/' . $dancer->imagen);
//
//            // Verificar si la imagen existe
//            if (file_exists($imagePath)) {
//                // Leer el contenido de la imagen y codificarlo en base64
//                $imageData = file_get_contents($imagePath);
//                $base64Image = base64_encode($imageData);
//
//                // Establecer el atributo 'image' con la imagen en base64
//                $dancer->image = $base64Image;
//            }
//        });
        return $dancer;
    }
    public function timeCalculate($timeNew, $timeOld){
        $timeNew = strtotime($timeNew);
        $timeOld = strtotime($timeOld);
        $time = $timeNew - $timeOld;
        return $time;
    }
    function updateOne(Request $request){
//        $url = env('URL_SOCKET' , 'http://localhost:3000');
//        http
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url . '/dance/' . $request->id . '/' . $request->lat . '/' . $request->lng);
        $response = $response->getBody()->getContents();
        return $response;

    }
}
