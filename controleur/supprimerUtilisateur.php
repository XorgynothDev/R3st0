<?php

use modele\dao\Bdd;
use modele\dao\UtilisateurDAO;

Bdd::connecter();

// Récupération des données GET, POST, et SESSION
if(!isset($_GET["idU"])) {
    // Pb : pas d'id d'utilisateur
    ajouterMessage("Supprimer utilisateur : il faut un utilisateur");
    $titre = "erreur";
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/pied.html.php";
} else {
    $idU = getIdULoggedOn();

    if($idU != 0) {
        $util = UtilisateurDAO::getOneById($idU);

        $response = "error";

        if($util->isAdministrator()) {
            if(!UtilisateurDAO::getOneById($_GET["idU"])->isAdministrator()) {
                UtilisateurDAO::deleteUtil(intval($_GET["idU"]));
                $response = "success";
            }

            header('Location: ' . $_SERVER['HTTP_REFERER'] . "&response=" . $response);
        } else {
            echo "Vous n'êtes pas un administrateur !";
        }
    } else {
        echo "Vous devez être connecté !";
    }
}
?>