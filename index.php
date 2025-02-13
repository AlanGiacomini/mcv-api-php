<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;

//Pacote do composer que ajudar a trabalhar com variáveis de ambiente
use \WilliamCosta\DotEnv\Environment;
//CARREGA VARIÁVEIS DE AMBIENTE
Environment::load(__DIR__);

//DEFINE A CONSTANTE DE URL DO PROJETO
define('URL', getenv('URL'));

//DEFINE O VALOR PADRÃO DAS VARIÁVEIS
View::init([
    'URL' => URL
]);

//INICIA O GERENCIADOR DE ROTAS
$obRouter = new Router(URL);

//INCLUI AS ROTAS DAS PAGINAS
include __DIR__.'/routes/pages.php';

//IMPRIME O RESPONSE DA ROTA
$obRouter->run()->sendResponse();