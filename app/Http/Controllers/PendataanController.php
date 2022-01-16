<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;

class PendataanController extends Controller
{
    //

    public function index()
    {
        $klient = new Client();
        $promise = $klient->requestAsync('GET', 'https://cat.jogjakota.go.id/api/reference/kecamatan');
        $promise->then(
            function (Response $res) {
                // echo $res->getStatusCode();
                $responseBody = json_decode($res->getBody(), true);
                dd($responseBody);
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );
        $promise->wait();
    } 

}