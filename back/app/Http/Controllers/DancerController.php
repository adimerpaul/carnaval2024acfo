<?php

namespace App\Http\Controllers;

use App\Models\Dancer;
use App\Http\Requests\StoreDancerRequest;
use App\Http\Requests\UpdateDancerRequest;

class DancerController extends Controller{
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
        return $dancers;
    }
    public function update(UpdateDancerRequest $request){
        $dancer = Dancer::find($request->id);
        $dancer->lat = $request->lat;
        $dancer->lng = $request->lng;
        $dancer->save();
        $dancers = Dancer::all();
        $data = ['username' => 'my-user'];
        $dancersArray = $dancers->toArray();
        $this->soketIO('dance', $dancersArray);
        return $dancer;
    }
}
