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

        if($util->isAdministrator()) {
            UtilisateurDAO::deleteUtil(intval($_GET["idU"]));
        } else {
            echo "Impossible de supprimer un Administrateur !";
        }
    } else {
        echo "Vous devez être connecté !";
    }

// redirection vers la page d'origine
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>