<?php echo $this->assign('monTitre', 'Affichage deux articles'); ?>
<h1> Voici l’aticle de la base de données : </h1>
<table class="table-bordered">
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Slug</th>
    </tr>
    <?php
    for ($i = 0; $i < $lesArticles->count(); $i++) {
        echo "<tr>";
        echo "<td>" . $lesArticles->first()->id . "</td>";
        echo "<td>" . $lesArticles->first()->name . "</td>";
        echo "<td>" . $lesArticles->first()->slug . "</td>";
        echo "</tr>";
    }
    ?>

</table>
