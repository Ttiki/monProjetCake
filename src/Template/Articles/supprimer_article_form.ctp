<?php
echo $this->Form->create('Article');

//Ajout d'un <input type=text> qui permet à l'utilisateur de facilement
// renseigner la valeur voulu.
echo $this->Form->input('id',
    array('label' => 'ID de l\'article', //Le label dessus le <input>
        'placeholder' => 'ID Article')); //Le text à l'intérieur du <input>
//Même manière qu'en HTML

// Ajout d'un bouton Submit et fermeture du formulaire
echo $this->Form->submit('Supprimer l\'article'); //Bouton submit
