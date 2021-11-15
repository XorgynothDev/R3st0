<?php

use modele\dao\TypeCuisineDAO;

/**
 * --------------
 * vueInscription
 * --------------
 * 
 * Variables transmises par le contrôleur inscription contenant les données à afficher : 
  ----------------------------------------------------------------------------------------  */
/** @var string $msg  message de vérification du formulaire*/
$lesAutresTypesCuisine = TypeCuisineDAO::getAll();
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
    <input type="text" name="photoR" placeholder="Chemin photo" /><br />
    
    <br />
    <br />

    Choisir d'autres types de cuisine : <br />
    <ul id="tagFood">
        <?php
        for ($i = 0; $i < count($lesAutresTypesCuisine); $i++) {
            $unTC = $lesAutresTypesCuisine[$i];
            ?>
            <input type="checkbox" name="addLstidTC[]" id="addType<?= $i ?>" value="<?= $unTC->getIdTC() ?>" >
            <label for="addType<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $unTC->getLibelleTC() ?></li></label><br />
        <?php } ?>
    </ul>
    <br />
    <br />

    <input type="submit" value="Ajouter" />
</form>