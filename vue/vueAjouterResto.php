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
<form action="./?action=ajouterResto" method="POST">

    <input type="text" name="nomR" placeholder="Nom" /><br />
    <input type="text" name="numAdr" placeholder="Numéro rue"  /><br />
    <input type="text" name="voieAdr" placeholder="Voie rue" /><br />
    <input type="text" name="cpR" placeholder="Code postal" /><br />
    <input type="text" name="villeR" placeholder="Ville" /><br />
    <input type="text" name="latitudeDegR" placeholder="Latitude" /><br />
    <input type="text" name="longitudeDegR" placeholder="Longitude" /><br />
    <input type="text" name="descR" placeholder="Description" /><br />
    <input type="text" name="horairesR" placeholder="Horaire" /><br />

    <input type="submit" value="Ajouter" />
</form>