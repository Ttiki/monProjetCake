<?php
$this->assign('MonTitre',"Affichage Liaisons Fournisseurs");?>

<h1> Liste des fournisseurs de : <?php echo $lesArticles['name'] ?> </h1>

<table class="table-bordered">
    <tr><th>Fournisseur</th></tr>
    <?php foreach ($lesArticles->fournisseurs as $fournisseur) {?>
        <tr>
            <td><?php echo $fournisseur['name'] ?></td>

        </tr>
    <?php }?>
</table>
