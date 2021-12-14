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
    <input type="text" maxlength="5" name="cpR" placeholder="Code postal" /><br />

    <p>Ville : <font color="orange">*</font></p>
    <input type="text" name="villeR" placeholder="Ville" /><br />

    <p>Latitude :</p>
    <input type="text" name="latitudeDegR" placeholder="Latitude" /><br />

    <p>Longitude :</p>
    <input type="text" name="longitudeDegR" placeholder="Longitude" /><br />

    <p>Description : <font color="orange">*</font></p>
    <input type="text" name="descR" placeholder="Description" /><br />

    <p>Horaire :</p>
    <textarea name="horairesR" rows="30" cols="50" value="test"><table>
    <thead>
        <tr>
            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="label">Midi</td>
            <td class="cell">de 11h45 à 14h30</td>
            <td class="cell">de 11h45 à 15h00</td>
        </tr>
        <tr>
            <td class="label">Soir</td>
            <td class="cell">de 18h45 à 22h30</td>
            <td class="cell">de 18h45 à 1h</td>
        </tr>
        <tr>
            <td class="label">À emporter</td>
            <td class="cell">de 11h30 à 23h</td>
            <td class="cell">de 11h30 à 2h</td>
        </tr>
    </tbody>
</table></textarea>
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