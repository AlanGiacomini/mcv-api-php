<?php

namespace App\Http;

class Response{

    /**
     * Código do status HTTP
     * @var int
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do Response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que está sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteúdo do Response
     * @var mixed
     */
    private $content;

    /**
     * Método responsável por iniciar a classe e iniciar os valores
     * @param int $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html'){
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }


    /**
     * Set tipo de conteúdo que está sendo retornado
     *
     * @param  string  $contentType  Tipo de conteúdo que está sendo retornado
     */ 
    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Método responsável por adicionar um registro no cabeçalho do response
     * @param mixed $key
     * @param mixed $value
     */
    public function addHeader ($key, $value){
        $this->headers[$key] = $value;
    }

    /**
     * Método responsável por enviar os Headers ao navegador
     * @return [type]
     */
    private function sendHeaders(){
        //STATUS
        http_response_code($this->httpCode);

        //ENVIAR headers
        foreach ($this->headers as $key => $value) {
            header($key.': '.$value);
        }
    }

    public function sendResponse(){
        //Envia os headers ao navegador
        $this->sendHeaders();

        //Imprime o conteúdo
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }
}