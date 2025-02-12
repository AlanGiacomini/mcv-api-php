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
        return new Response(200,Pages\About::getAbout());
    }
]);
//Rota Dinâmica
$obRouter->get('/pagina/{idPagina}/{acao}', [
    function($idPagina, $acao){
        return new Response(200,'Página '.$idPagina." - ".$acao);
    }
]);