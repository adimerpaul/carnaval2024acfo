<?php

namespace App\Http\Controllers;

use App\Models\Dancer;
use App\Http\Requests\StoreDancerRequest;
use App\Http\Requests\UpdateDancerRequest;

class DancerController extends Controller{
    public function index(){
        return Dancer::all();
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
