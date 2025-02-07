<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Http\Response;
use \App\Controller\Pages\Home;

define('URL', 'http://localhost/mvc2025');

$obRouter = new Router(URL);

//Rota Home
$obRouter->post('/', [
    function(){
        return new Response(200, Home::getHome());
    }
]);

//IMPRIME O RESPONSE DA ROTA
$obRouter->run()->sendResponse();