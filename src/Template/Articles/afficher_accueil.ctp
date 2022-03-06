<?php
$this->assign('MonTitre', 'Mon Accueil');
echo "Bienvenue " +
    $this->request->getParam("nom") + " "
    +  $this->request->getParam("prenom");
?>
