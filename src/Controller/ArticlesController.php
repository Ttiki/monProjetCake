<?php

namespace App\Controller;

use App\Model\Entity\Article;
use Cake\ORM\Query;

class ArticlesController extends AppController
{

    // public function test()
    // {

    //     // accès à la couche Modèle :
    //     $objTableArticles = $this->Articles;
    //     //Création de la requête
    //     $objQuery = $objTableArticles->find();
    //     $objQuery->select([
    //         'nb' => $objQuery->func()->count('id')
    //     ]);
    //     //Exécution de la requête et récupération d’on objet de la classe Entity
    //     $objEntityArticle = $objQuery->first();
    // }

    public function afficheAccueil($nom, $prenom)
    {
        $this->set('nom', $nom);
        $this->set('prenom', $prenom);
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

    public function afficheEgalTrois()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug']);
        $objQuery->where(['id = 3']);
        $lArticle = $objQuery->first();
        $this->set('lArticle', $lArticle);
    }

    public function afficheSuperieurTrois()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug']);
        $objQuery->where(['id > 3']);
        $lesArticles = $objQuery->all();
        debug($lesArticles);
        $this->set('lesArticles', $lesArticles);
    }

    //     Select *
    // from articles
    public function afficheRequeteUn()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug']);
        $lesArticles = $objQuery->all();
        debug($lesArticles);
        $this->set('lesArticles', $lesArticles);
    }

    // 1. Select name, created
    // from articles
    // limit 2
    public function afficheRequeteDeux()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug']);
        $objQuery->limit(2);
        $lesArticles = $objQuery->all();
        debug($lesArticles);
        $this->set('lesArticles', $lesArticles);
    }


    // 2. Select count(id)
    // from articles
    // where id = 3
    public function afficheRequeteTrois()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id']);
        $objQuery->where(['id = 3']);
        $leNbArticles = $objQuery->count();
        $this->set('leNbArticles', $leNbArticles);
    }

    public function testMethodesMagiques()
    {
        $objTableArticles = $this->Articles;
        $objQuery = $objTableArticles->findById('1');
        $recupEntityArticle = $objQuery->first();
        debug($recupEntityArticle);
    }
}
