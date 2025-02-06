<?php

namespace App\Http;

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
        echo '<pre>';
        print_r($method);
        echo '<pre>';
        echo '<pre>';
        print_r($route);
        echo '<pre>';
        echo '<pre>';
        print_r($params);
        echo '<pre>';
    }

    /**
     * Método responsável por definir uma rota de get
     * @param string $route
     * @param array $params
     */
    public function get($route, $params = []){
        return $this->addRoute('GET', $route, $params);
    }
}