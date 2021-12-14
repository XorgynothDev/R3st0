<?php

use modele\dao\RestoDAO;

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
    ?>
    <h1>Modifier restaurant</h1>
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

        <br/>
        <br/>

        Les types de cuisine déjà selectionnés : <br />
        <ul id="tagFood">
            <?php
            for ($i = 0; $i < count($mesTypeCuisinePreferes); $i++) {
                $unTC = $mesTypeCuisinePreferes[$i];
                ?>
                <input type="checkbox" name="delLstidTC[]" id="delType<?= $i ?>" value="<?= $unTC->getIdTC() ?>" >
                <label for="delType<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $unTC->getLibelleTC() ?></li></label><br />
            <?php } ?>
        </ul>
        <br />
        <p>Pas terminé</p>
        <br /><br />
    </form>
<?php
} else {
    echo "Vous devez selectionner un restaurant !";
}

?>