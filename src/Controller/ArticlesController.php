<?php
namespace App\Controller;

class ArticlesController extends AppController
{
    public function afficheAccueil()
    {
        die("Bienvenue a tous");
    }
    public function afficheMessage($libelle)
    {
        //die ("Voici la $libelle");
        //debug($this->request->getParam('pass'));
        echo ("Voici la $libelle");
    }
    public function index()
    {
        debug($this->request->getParam('controller'));
        debug($this->request->getParam('action'));
        debug($this->request->getQuery('categorie'));
        debug($this->request->getQuery('libelle'));
        debug($this->request->getQueryParams());
        debug($this->request->getParam('pass'));
        debug($this->request->getParam('data'));
    }
}