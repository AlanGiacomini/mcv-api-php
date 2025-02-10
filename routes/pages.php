<?php

use \App\Http\Response;

use \App\Controller\Pages;

//Rota Home
$obRouter->get('/', [
    function(){
        return new Response(200,Pages\Home::getHome());
    }
]);
//Rota Sobre
$obRouter->get('/sobre', [
    function(){
        return new Response(200,Pages\Home::getHome());
    }
]);