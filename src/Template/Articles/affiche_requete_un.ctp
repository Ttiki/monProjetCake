<?php echo $this->assign('monTitre', 'Affichage tous les articles '); ?>
<h1> Voici l’aticle de la base de données : </h1>
<table class="table-bordered">
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Slug</th>
    </tr>
    <tr>
        <td> <?php echo $lesArticles->first()->id ?></td>
        <td><?php echo $lesArticles->first()->name ?></td>
        <td><?php echo $lesArticles->first()->slug ?></td>
    </tr>

</table>
