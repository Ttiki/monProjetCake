<?php $this->assign('MonTitre', "Affichage un Article GET"); ?>

<h1> Voici l’article de la base de données : <?php echo $currentId; ?></h1>

<table class="table-bordered">
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Slug</th>
    </tr>
    <tr>
        <td> <?php echo $recupArticles['id'] ?></td>
        <td><?php echo $recupArticles['name'] ?></td>
        <td><?= $recupArticles['slug'] ?></td>
    </tr>
</table>
