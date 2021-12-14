<?php

use modele\dao\Bdd;
use modele\dao\TypeCuisineDAO;
use modele\dao\UtilisateurDAO;

Bdd::connecter();


// Récupération des données GET, POST, et SESSION
if(!isset($_GET["idTC"])) {
    // Pb : pas de type de cuisine
    ajouterMessage("Supprimer type de cuisine : il faut un type de cuisine");
    $titre = "erreur";
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/pied.html.php";
} else {
    $idU = getIdULoggedOn();

    if($idU != 0) {
        $util = UtilisateurDAO::getOneById($idU);

        if($util->isAdministrator()) {
            TypeCuisineDAO::deleteTC(intval($_GET["idTC"]));
            header('Location: ' . $_SERVER['HTTP_REFERER'] . "&response=success");
        } else {
            echo "Impossible de supprimer un Type de cuisine !";
        }
    } else {
        echo "Vous devez être connecté !";
    }
}

?>