<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Testimony extends Page
{       
        
    /**
     * Método responsável por retornar o conteúdo (view) de depoimentos
     *
     * @return string
     * 
     */
    public static function getTestimonies() {

        //RETORNA O CONTEÚDO DA SOBRE
        $content = View::render('pages/testimonies',[

        ]);

        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Depoimentos - Projeto MVC PHP', $content);
    }
}
