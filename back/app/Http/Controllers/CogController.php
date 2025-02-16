<?php

namespace App\Http\Controllers;

use App\Models\Cog;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class CogController extends Controller
{
    public function index()
    {
        return Cog::where('id', 1)->first();
    }
    public function update(Request $request)
    {
        $cog = Cog::find(1);
        error($cog);
        $cog->value = $cog->value+1;
        $cog->save();
        return $cog;
    }
    function lineas(){
//        return [
//            [-17.96712, -67.11805],
//            [-17.96726, -67.11782],
//            [-17.96887, -67.11292],
//            [-17.96966, -67.11322],
//            [-17.9694, -67.1141],
//            [-17.96945, -67.11416],
//            [-17.97019, -67.11438],
//            [-17.97129, -67.11061],
//            [-17.96458, -67.10886],
//            [-17.96468, -67.10677],
//            [-17.96391, -67.10657]
//        ];

        return [
            [-17.96375, -67.10653],
            [-17.964687, -67.106802],
            [-17.96137, -67.10585],
            [-17.96128, -67.10702],
            [-17.97063, -67.10961],
            [-17.96965, -67.11322],
            [-17.97045, -67.11351],
            [-17.97125, -67.11065],
            [-17.96458, -67.10888],
            [-17.964690, -67.106890]
        ];

    }
}
