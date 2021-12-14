<?php

use modele\dao\UtilisateurDAO;


/**
 * --------------
 * vueAjouterTC
 * --------------
 *
 * @version 07/2021 par NB : intégration couche modèle objet
 * @version 09/2021 par NC : remplace vueResultRecherche
 *
 * Variables transmises par le contrôleur listeRestos ou rechercheresto contenant les données à afficher :
---------------------------------------------------------------------------------------- */
/** @var string $listeTC les types de cuisines filtrés */
/**
 * Variables supplémentaires :
------------------------- */
/** @var Utilisateur $idU */

?>
    <h1>Ajouter un type de cuisine</h1>

<?php
$idU = getIdULoggedOn();

if($idU != 0) {
    $util = UtilisateurDAO::getOneById($idU);

    if($util->isAdministrator()) { ?>
        <form action="./?action=ajouterTC" method="POST">

            <input type="text" name="libelleTC" placeholder="Nom" /><br />

            <input type="submit" value="Ajouter" />
        </form>

        <?php
    } else {
        echo "Vous n'êtes pas un administrateur !";
    }
} else {
    echo "Vous devez être connecté !";
}
?>