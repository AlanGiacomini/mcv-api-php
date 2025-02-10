<?php

namespace App\Http;

use \Closure;
use \Exception;

class Router{

    /**
     * URL completa do projeto (Raiz do Projeto)
     * @var string
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     * @var string
     */
    private $prefix = '';

    /**
     * Lista (índice) de rotas
     * @var array
     */
    private $routes = [];

    /**
     * Instância de Request
     * @var request
     */
    private $request;

    /**
     * Método responsável por iniciar a classe
     * @param string $url
     */
    public function __construct($url) {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * Set prefixo de todas as rotas
     *
     * @param  string  $prefix  Prefixo de todas as rotas
     */ 
    public function setPrefix()
    {
        //Informações da URL atual
       $parseURL = parse_url($this->url);

       //Define o prefixo
       $this->prefix = $parseURL['path'] ?? '';
    }

    /**
     * Método responsável por adicionar uma rota na classe
     * @param string $method
     * @param string $route
     * @param array $params
     */
    private function addRoute($method, $route, $params = []){
        //VALIDAÇÃO DOS PARÂMETROS
        foreach ($params as $key => $value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //PADRÃO DE VALIDAÇÃO DA URL
        $patternRoute = '/^'.str_replace('/', '\/', $route).'$/';

        //ADICIONA A ROTA DENTRO DA CLASSE;
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Método responsável por definir uma rota de get
     * @param string $route
     * @param array $params
     */
    public function get($route, $params = []){
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de POST
     * @param string $route
     * @param array $params
     */
    public function post($route, $params = []){
        return $this->addRoute('POST', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de PUT
     * @param string $route
     * @param array $params
     */
    public function put($route, $params = []){
        return $this->addRoute('PUT', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de DELETE
     * @param string $route
     * @param array $params
     */
    public function delete($route, $params = []){
        return $this->addRoute('DELETE', $route, $params);
    }

    /**
     * Método responsável por retornar a URI desconsiderando o prefixo
     * @return string
     */
    private function getUri(){
        //URI da REQUEST
        $uri = $this->request->getUri();

        // FATIA A URI COM O PREFIX
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

        // Retorna a Uri sem prefixo
        return end($xUri);
    }

    /**
     * Método responsável por retornar os dados da rota atual
     * @return array
     */
    private function getRoute(){
        //URI
        $uri = $this->getUri();

        //METHOD
        $httpMethod = $this->request->getHttpMethod();

        //VALIDA AS ROTAS
        foreach ($this->routes as $patternRoute => $methods) {
            //VERIFICA SE A URI BATE COM O PADRÃO
            if(preg_match($patternRoute, $uri)){
                //Verifica o método
                if(isset($methods[$httpMethod])){
                    return $methods[$httpMethod];
                }
                throw new Exception("Método não permitido", 405);
            }
            throw new Exception("URL não encontrada", 404);
        }
    }

    /**
     * Método responsável por executar a rota atual
     * @return Response
     */
    public function run(){
        try {
            //OBTÉM A ROTA ATUAL
            $route = $this->getRoute();

            //VERIFICA SE O CONTROLADOR EXISTE
            if(!isset($route['controller'])){
                throw new Exception('A URL não pôde ser processada', 500);
            }

            //ARGUMENTOS DA FUNÇÃO
            $args = [];

            return call_user_func_array($route['controller'], $args);


        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}