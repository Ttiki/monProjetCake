<?php

namespace App\Controller;

class ArticlesController extends AppController
{

    //Affiche le nom et prenom sur la page d'accueil
    // (URL=http://localhost/university-cakePHP-project/Articles/AfficherAccueil?nom=combier&prenom=clement)
    public function afficherAccueil($nom, $prenom)
    {
        debug($nom, $prenom);
        $this->set('nom', $nom);
        $this->set('prenom', $prenom);

    }

    //Affiche un simple message sur la page.
    //(URL=http://localhost/university-cakePHP-project/Articles/AfficherMessage/helloWorld)
    public function afficherMessage($libelle)
    {
        $this->set('libelle', $libelle);
    }

    //Méthode test. Nous utilisons la commande debu pour afficher des messages concernant
    //Chacun des paramètres.
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

    //Méthode simple qui permet de faire un requête SQL-like pour afficher les
    //articles dont l'id = 3. Nous affichons l'id, le nom et le slug.
    //Si plusieurs résultats sont retournés, nous ne renvoyons que le premier sur
    //la page ($objQuery->first())
    public function afficherEgalTrois()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug']);
        $objQuery->where(['id = 3']);
        $lArticle = $objQuery->first();
        $this->set('lArticle', $lArticle);
    }

    //Même principe que la méthode ci-dessus. Nous affichons les articles dont
    //l'id >= 3. Nous renvoyons ici un tableau d'articles que nous parcourirons sur la page
    //(afficher_superieur_trois.ctp) pour afficher les informations de chaque article
    //séparément.
    public function afficherSuperieurTrois()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug']);
        $objQuery->where(['id > 3']);
        $lesArticles = $objQuery->all();
        $this->set('lesArticles', $lesArticles);
    }

    //Première requête pour la question 12
    public function requeteUn()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id', 'name', 'slug', 'created']);
        $lesArticles = $objQuery->all();
        $this->set('lesArticles', $lesArticles);
    }

    //Deuxième requête pour la question 12
    public function requeteDeux()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['name', 'created']);
        $objQuery->limit(2);
        $lesArticles = $objQuery->all();
        $this->set('lesArticles', $lesArticles);
    }

    //Troisième requête pour la question 12
    public function requeteTrois()
    {
        $objQuery = $this->Articles->find();
        $objQuery->select(['id']);
        $objQuery->where(['id = 3']);
        $leNbArticles = $objQuery->count();
        $this->set('leNbArticles', $leNbArticles);
    }

    //Méthode test pour tester les méthodes magiques de CakePHP
    public function testMethodesMagiques()
    {
        $objTableArticles = $this->Articles;
        $objQuery = $objTableArticles->findById('1');
        $recupEntityArticle = $objQuery->first();
        debug($recupEntityArticle);
    }

    //Cette méthode affiche un formulaire à l'utilisateur où il peut renseigner
    //Le nom ainsi que le slug d'un article pour le chercher. Si on le trouve, on l'affiche.
    //Sinon on l'ajoute à notre BD.
    //Défaut: afficherUnArticle
    //URL:http://localhost/university-cakePHP-project/Articles/afficherAjouterArticle>
    public function afficherAjouterArticle()
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

    //Affiche un article en utilisant la méthode GET
    public function afficherUnArticleGet($id)
    {
        $objTableArticles = $this->Articles;
        $objQuery = $objTableArticles->findById($id);
        $recupEntityArticle = $objQuery->first();
        $this->set('currentId', $id);
        $this->set('recupArticles', $recupEntityArticle);
    }

    //Supprime l'article 3
    //La valeur ici est codé en dure
    public function supprimerArticle3()
    {
        $objTableArticles = $this->Articles;
        $objArticleEntity = $objTableArticles->get(3);
        $objTableArticles->delete($objArticleEntity);
    }

    //Supprimer un article selon son id depuis un argument se trouvant dans
    //l'URL.
    public function supprimerArticleUrl($id)
    {
        $objTableArticles = $this->Articles;
        $objArticleEntity = $objTableArticles->get($id);
        $objTableArticles->delete($objArticleEntity);
    }

    //Affiche un formulaire pour l'utilisateur afin qu'il choisisse l'article
    //à supprimer en rentrant les informations de l'article.
    public function supprimerArticleForm()
    {
        if ($this->request->is('POST')) {
            echo 'Suppression de l\'article';
            $tabPOST = $this->request->getData();
            $message = "Article supprimé";

            $objTableArticles = $this->Articles;
            $objArticleEntity = $objTableArticles->get($tabPOST['id']);
            $objTableArticles->delete($objArticleEntity);
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
