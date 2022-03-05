<?php
echo $this->Form->create('Article');
// Ajout d'une zone de texte associée à un champ de la table ici name et
//valorisation de sa balise label et de sa valeur par défaut
echo $this->Form->input('id', array('label' => 'ID de l\'article', 'placeholder' => 'ID Article'));
// Ajout d'un bouton Submit et fermeture du formulaire
echo $this->Form->submit('Supprimer l\'article');
