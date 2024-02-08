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
}
