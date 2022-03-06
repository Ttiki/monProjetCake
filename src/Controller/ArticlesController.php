<?php

namespace App\Controller;

class ArticlesController extends AppController
{

    //Affiche le nom et prenom sur la page d'accueil
    // (URL=http://localhost/monProjetCake/Articles/afficherAccueil?nom=Combier&prenom=Clement

    public function afficherAccueil($nom, $prenom)
    {
        debug($nom, $prenom);
        $this->set('nom', $nom);
        $this->set('prenom', $prenom);

    }

    public function afficherMessage($libelle)
    {
        $this->set('libelle', $libelle);
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
        die('');
    }

    public function afficherEgalTrois()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug']);
        $objQuery->where(['id = 3']);
        $lArticle = $objQuery->first();
        $this->set('lArticle', $lArticle);
    }

    public function afficherSuperieurTrois()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug']);
        $objQuery->where(['id > 3']);
        $lesArticles = $objQuery->all();
//        debug($lesArticles);
        $this->set('lesArticles', $lesArticles);
    }

    public function requeteUn()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug', 'created']);
        $lesArticles = $objQuery->all();
        $this->set('lesArticles', $lesArticles);
    }

    public function requeteDeux()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['name', 'created']);
        $objQuery->limit(2);
        $lesArticles = $objQuery->all();
        $this->set('lesArticles', $lesArticles);
    }

    public function requeteTrois()
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

    public function afficherUnArticle()
    {
        if ($this->request->is('POST')) {
            date_default_timezone_set('Europe/Paris');

            $objQuery = $this->Articles->find();
            $lesArticles = $objQuery->all();
            $tabPOST = $this->request->getData();

            $isUniqueName = true;
            foreach ($lesArticles as $article) {
                if ($article['name'] == $tabPOST['name']) {
                    $isUniqueName = false;
                    break;
                }

            }
            if ($isUniqueName) {
                echo 'Cet article est inexistant dans la base, il va etre cree';
                $objArticlesTable = $this->Articles;
                $objNvArticleEntity = $objArticlesTable->newEntity();
                $objNvArticleEntity->name = $tabPOST['name'];
                $objNvArticleEntity->slug = $tabPOST['slug'];
                $objNvArticleEntity->created = date('Y-m-d h:i:s');
                $objArticlesTable->save($objNvArticleEntity);
                $message = "Article ajouté";
            } else {
                $message = "Un Article avec le même nom existe déjà !";
            }
            $this->set('message', $message);
            $this->render('ajoute_un_article_success');


        }
    }

    public function AfficherUnArticleGet($id)
    {
        $objTableArticles = $this->Articles;
        $objQuery = $objTableArticles->findById($id);
        $recupEntityArticle = $objQuery->first();
        $this->set('currentId', $id);
        $this->set('recupArticles', $recupEntityArticle);
    }

    public function SupprimerArticle3()
    {
        $objTableArticles = $this->Articles;
        $objArticleEntity = $objTableArticles->get(3);
        $objTableArticles->delete($objArticleEntity);
    }

    public function SupprimerArticleUrl($id)
    {
        $objTableArticles = $this->Articles;
        $objArticleEntity = $objTableArticles->get($id);
        $objTableArticles->delete($objArticleEntity);
    }

    public function SupprimerArticleForm()
    {
        if ($this->request->is('POST')) {
            echo 'Suppression de l\'article';
            $tabPOST = $this->request->getData();
            $message = "Article supprimé";

            $objTableArticles = $this->Articles;
            $objArticleEntity = $objTableArticles->get($tabPOST['id']);
            $objTableArticles->delete($objArticleEntity);
//            $this->set('message', $message);
//            $this->render('supprimer_article');
        }
    }

    public function afficherLiaisons()
    {
        $objTableArticles = $this->Articles;
        $objQuery = $objTableArticles->find();
        $objQuery->contain(['categs', 'emplacements']);
        $objEntityArticle = $objQuery->all();
        $this->set('objEntityArticle', $objEntityArticle);
    }

    public function afficherArticlesFournisseurs()
    {
        $objTableArticles = $this->Articles;
        $objQuery = $objTableArticles->find();
        $objQuery->contain(['fournisseurs']);
        $objEntityArticle = $objQuery->all();
        $this->set('objEntityArticle', $objEntityArticle);
    }

    public function afficherUnArticleFournisseur($id)
    {
        $objTableArticles = $this->Articles;
        $objQuery = $objTableArticles->find();
        $objQuery->contain(['fournisseurs']);
        $objQuery->where(['id = ' . $id]);
        $lesArticles = $objQuery->first();
        $this->set('lesArticles', $lesArticles);

    }
}
