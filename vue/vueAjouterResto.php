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
<form action="./index.php?action=ajouterResto" method="POST">

    <input type="text" name="mailU" placeholder="Email de connexion" /><br />
    <input type="password" name="mdpU" placeholder="Mot de passe"  /><br />
    <input type="text" name="pseudoU" placeholder="Pseudo" /><br />

    <input type="submit" value="Ajouter" />

</form>