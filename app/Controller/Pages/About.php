<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class About extends Page
{       
        
    /**
     * Método responsável por retornar o conteúdo (view) da nossa sobre
     *
     * @return string
     * 
     */
    public static function getAbout() {
        $obOrganization = new Organization;

        //RETORNA O CONTEÚDO DA SOBRE
        $content = View::render('pages/about',[
            'name' => $obOrganization->name,
            'description' => $obOrganization->description,
            'site' => $obOrganization->site
        ]);

        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Sobre - Projeto MVC PHP', $content);
    }
}
