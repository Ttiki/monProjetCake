<?php $this->assign('MonTitre',"Affichage de 2 Articles max");?>

<h1> Voici l’article de la base de données : </h1>

<table class="table-bordered">
    <tr><th>Nom</th><th>Created</th></tr>
    <?php foreach ($lesArticles as $lArticle) {?>
        <tr>
            <td><?php echo $lArticle->name ?></td>
            <td><?=  $lArticle->created ?></td>
        </tr>
    <?php }?>
</table>
