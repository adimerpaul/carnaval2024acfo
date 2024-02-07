<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use ElephantIO\Client;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function soketIO($urlSocket,$data){
        $url = env('URL_SOCKET');
        // return "url: ".$url;
        $client = new Client(Client::engine(Client::CLIENT_4X, $url));
        $client->initialize();
        $client->of('/');
        $client->emit($urlSocket, $data);
    }

}
