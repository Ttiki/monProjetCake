<?php
$this->assign('MonTitre', "Affichage Liaisons Articles"); ?>

<h1> Voici l’article de la base de données : </h1>

<table class="table-bordered">
    <tr>
        <th>Nom</th>
        <th>Catégorie</th>
        <th>Emplacement</th>
    </tr>
    <?php foreach ($objEntityArticle as $lArticle) { ?>
        <tr>
            <td><?php echo $lArticle['name'] ?></td>
            <td><?php echo $lArticle->Categs['name'] ?></td>
            <td><?php echo $lArticle->Emplacements['name'] ?></td>
        </tr>
    <?php } ?>
</table>
