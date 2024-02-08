<?php

namespace App\Http\Controllers;

use App\Models\Dancer;
use App\Http\Requests\StoreDancerRequest;
use App\Http\Requests\UpdateDancerRequest;
use App\Models\User;

class DancerController extends Controller{
    public function index(){
        $dancers = Dancer::all();
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
        $user = User::where('id', $request->user()->id)->first();
        error_log('user: ' . json_encode($user));
        $timeNew = date('Y-m-d H:i:s');
        $timeOld = $user->access;
        $user->access = date('Y-m-d H:i:s');
        $user->time = $this->timeCalculate($timeNew, $timeOld);
        $user->save();
        return $dancer;
    }
    public function timeCalculate($timeNew, $timeOld){
        $timeNew = strtotime($timeNew);
        $timeOld = strtotime($timeOld);
        $time = $timeNew - $timeOld;
        return $time;
    }
}
