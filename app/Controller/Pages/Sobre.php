<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Sobre extends Page
{       
        
    /**
     * Método responsável por retornar o conteúdo (view) da nossa sobre
     *
     * @return string
     * 
     */
    public static function getSobre() {
        $obOrganization = new Organization;

        //RETORNA O CONTEÚDO DA SOBRE
        $content = View::render('pages/sobre',[
            'name' => $obOrganization->name
        ]);

        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Projeto - Page Render', $content);
    }
}
