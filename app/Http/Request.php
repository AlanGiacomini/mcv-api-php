<?php

namespace App\Http;

class Request{

    /**
     * Método HTTP da requisição
     * @var string
     */
    private $httpMethod;

    /**
     * URI da página
     * @var string
     */
    private $uri;

    /**
     * Parâmetros da URL ($_GET)
     * @var array
     */
    private $queryParams = [];

    /**
     * Variáveis recebidas no POST da página ($_POST)
     * @var array
     */
    private $postVars = [];

    /**
     * Cabeçalho da Requisição
     * @var array
     */
    private $headers = [];

    /**
     * Construtor da Classe
     */
    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }

    /**
     * Método responsável por retornar o método HTTP da requisição
     * @return string
     */
    public function getHttpMethod(){
        return $this->httpMethod;
    }
    
    /**
     * Método responsável por retornar o URI da requisição
     * @return string
     */
    public function getUri(){
        return $this->uri;
    }

    /**
     * Get parâmetros da URL ($_GET)
     *
     * @return  array
     */ 
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * Get variáveis recebidas no POST da página ($_POST)
     *
     * @return  array
     */ 
    public function getPostVars()
    {
        return $this->postVars;
    }

    /**
     * Get cabeçalho da Requisição
     *
     * @return  array
     */ 
    public function getHeaders()
    {
        return $this->headers;
    }
}