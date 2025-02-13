<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page
{       
        
    /**
     * Método responsável por retornar o conteúdo (view) da nossa home
     *
     * @return string
     * 
     */
    public static function getHome() {
        $obOrganization = new Organization;

        //RETORNA O CONTEÚDO DA HOME
        $content = View::render('pages/home',[
            'description' => $obOrganization->description
        ]);

        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Home - Projeto MVC PHP', $content);
    }
}
