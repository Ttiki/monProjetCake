<?php $this->assign('MonTitre',"Affichage des articles dont id > 3 ");?>

<h1> Voici l’article de la base de données : </h1>

<table class="table-bordered">
    <tr><th>id</th><th>Nom</th><th>Slug</th></tr>
    <?php foreach ($lesArticles as $lArticle) {?>
    <tr><td> <?php echo $lArticle->id ?></td>
        <td><?php echo $lArticle->name ?></td>
        <td><?=  $lArticle->slug ?></td>
    </tr>
    <?php }?>
</table>
