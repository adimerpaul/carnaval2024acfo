<?php

namespace App\Http\Controllers;

use App\Models\Dancer;
use App\Http\Requests\StoreDancerRequest;
use App\Http\Requests\UpdateDancerRequest;

class DancerController extends Controller{
    public function index(){
        return Dancer::all();
    }
}
