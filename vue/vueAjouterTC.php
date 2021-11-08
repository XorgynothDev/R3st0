<?php
/**
 * --------------
 * vueInscription
 * --------------
 * 
 * Variables transmises par le contrôleur inscription contenant les données à afficher : 
  ----------------------------------------------------------------------------------------  */
/** @var string $msg  message de vérification du formulaire*/
?>
<h1>Ajouter un restaurant</h1>

<form action="./?action=ajouterTC" method="POST">

    <input type="text" name="libelleTC" placeholder="Nom" /><br />

    <input type="submit" value="Ajouter" />
</form>