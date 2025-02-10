<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;

define('URL', 'http://localhost/mvc2025');

$obRouter = new Router(URL);

include __DIR__.'/routes/pages.php';

//IMPRIME O RESPONSE DA ROTA
$obRouter->run()->sendResponse();