<?php

use modele\dao\UtilisateurDAO;


/**
 * --------------
 * vueListeRestos
 * --------------
 *
 * @version 07/2021 par NB : intégration couche modèle objet
 * @version 09/2021 par NC : remplace vueResultRecherche
 *
 * Variables transmises par le contrôleur listeRestos ou rechercheresto contenant les données à afficher :
---------------------------------------------------------------------------------------- */
/** @var array $listeTC les types de cuisines filtrés */
/**
 * Variables supplémentaires :
------------------------- */
/** @var Utilisateur $idU */

?>
    <h1>Liste des types de cuisine</h1>

<?php
$idU = getIdULoggedOn();

if($idU != 0) {
    $util = UtilisateurDAO::getOneById($idU);

    if($util->isAdministrator()) {
        foreach($listeTC as $typeCuisine) {
            $libelleTC = $typeCuisine->getlibelleTC();
            ?>

            <div class="cardTC">
                <div class="descrCard">
                    <?php
                    echo $libelleTC;
                    echo "<br>";
                    ?>
                    <a href="./?action=supprimerTC&idTC=<?= $typeCuisine->getIdTC(); ?>"><button class="deleteTC">Supprimer</button></a>
                </div>
            </div>
            <?php
        } ?>

        <?php
    } else {
        echo "Vous n'êtes pas un administrateur !";
    }
} else {
    echo "Vous devez être connecté !";
}
?>