<?php $this->assign('MonTitre',"Affichage id article = 3");?>

<h1> Voici l’article de la base de données : </h1>

<table class="table-bordered">
    <tr><th>id</th></tr>
    <?php foreach ($lesArticles as $lArticle) {?>
        <tr><td> <?php echo $lArticle->id ?></td>
        </tr>
    <?php }?>
</table>
