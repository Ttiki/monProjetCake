<?php
$this->assign('MonTitre', "Affichage Liaisons Articles"); ?>

<h1> Voici l’article de la base de données : </h1>

<table class="table-bordered">
    <tr>
        <th>Nom</th>
        <th>Fournisseur</th>
    </tr>
    <?php foreach ($objEntityArticle as $lArticle) { ?>
        <tr>
            <td><?php echo $lArticle['name'] ?></td>
            <td>
                <?php foreach ($lArticle->fournisseurs as $fournisseur) {
                    echo $fournisseur['name'] . "\n";
                }
                ?>
            </td>
        </tr>
    <?php } ?>
</table>
