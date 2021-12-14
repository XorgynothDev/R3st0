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
<br>
<h3><font color="orange">* Obligatoire</font></h3>
<br>
<form action="./?action=ajouterResto" method="POST">

    <p>Nom : <font color="orange">*</font></p>
    <input type="text" name="nomR" placeholder="Nom" /><br />

    <p>Numéro de rue : <font color="orange">*</font></p>
    <input type="text" name="numAdr" placeholder="Numéro rue"  /><br />

    <p>Vooie de la rue : <font color="orange">*</font></p>
    <input type="text" name="voieAdr" placeholder="Voie rue" /><br />

    <p>Code postal : <font color="orange">*</font></p>
    <input type="text" name="cpR" placeholder="Code postal" /><br />

    <p>Ville : <font color="orange">*</font></p>
    <input type="text" name="villeR" placeholder="Ville" /><br />

    <p>Latitude :</p>
    <input type="text" name="latitudeDegR" placeholder="Latitude" /><br />

    <p>Longitude :</p>
    <input type="text" name="longitudeDegR" placeholder="Longitude" /><br />

    <p>Description : <font color="orange">*</font></p>
    <input type="text" name="descR" placeholder="Description" /><br />

    <p>Horaire :</p>
    <input type="text" name="horairesR" placeholder="Horaire" /><br />
    <!--<input type="text" name="photoR" placeholder="Chemin photo" /><br />-->
    
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