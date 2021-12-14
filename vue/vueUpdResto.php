<?php

use modele\dao\RestoDAO;
use modele\dao\TypeCuisineDAO;

/**
 * --------------
 * vueUpdResto
 * --------------
 * 
 * Variables transmises par le contrôleur inscription contenant les données à afficher : 
  ----------------------------------------------------------------------------------------  */
/** @var string $msg  message de vérification du formulaire*/

if(isset($_GET["idR"])) {
    $resto = RestoDAO::getOneById($_GET["idR"]);
    $lesTypesCuisine = $resto->getLesTypesCuisineProposes();
    $lesAutresTypesCuisine = TypeCuisineDAO::getAllNonPreferesByIdR($resto->getIdR());
    ?>
    <h1>Modifier un restaurant</h1>
    <br>
    <h3><font color="orange">* Obligatoire</font></h3>
    <br>
    <form action="./?action=ajouterResto" method="POST">

        <p>Nom : <font color="orange">*</font></p>
        <?php echo '<input type="text" name="nomR" value="' . $resto->getNomR() . '" />'?>

        <p>Numéro de rue : <font color="orange">*</font></p>
        <?php echo '<input type="text" name="numAdr" value="' . $resto->getNumAdr() . '" />'?>

        <p>Vooie de la rue : <font color="orange">*</font></p>
        <?php echo '<input type="text" name="voieAdr" value="' . $resto->getVoieAdr() . '" />'?>

        <p>Code postal : <font color="orange">*</font></p>
        <?php echo '<input type="text" name="cpR" value="' . $resto->getCpR() . '" />'?>

        <p>Ville : <font color="orange">*</font></p>
        <?php echo '<input type="text" name="villeR" value="' . $resto->getVilleR() . '" />'?>

        <p>Latitude :</p>
        <?php echo '<input type="text" name="latitudeDegR" value="' . $resto->getLatitudeDegR() . '" />'?>

        <p>Longitude :</p>
        <?php echo '<input type="text" name="longitudeDegR" value="' . $resto->getLongitudeDegR() . '" />'?>

        <p>Description : <font color="orange">*</font></p>
        <?php echo '<input type="text" name="descR" value="' . $resto->getDescR() . '" />'?>

        <p>Horaire :</p>
        <?php echo '    <textarea name="horairesR" rows="30" cols="50" value="test"><table>
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
</table></textarea>'?>
        <!--<input type="text" name="photoR" placeholder="Chemin photo" /><br />-->

        <br>
        <input type="submit" value="Modifier" />

        <br />
        <br />

        Les types de cuisine que je préfère : <br />
        <ul id="tagFood">
            <?php
            for ($i = 0; $i < count($lesTypesCuisine); $i++) {
                $unTC = $lesTypesCuisine[$i];
                ?>
                <input type="checkbox" name="delLstidTC[]" id="delType<?= $i ?>" value="<?= $unTC->getIdTC() ?>" >
                <label for="delType<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $unTC->getLibelleTC() ?></li></label><br />
            <?php } ?>
        </ul>
        <br />
        <br />
        <input type="submit" value="Supprimer" />
        <br /><br />


        <hr>

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
<?php
} else {
    echo "Vous devez selectionner un restaurant !";
}

?>