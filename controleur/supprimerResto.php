<?php

use modele\dao\Bdd;
use modele\dao\UtilisateurDAO;
use modele\dao\RestoDAO;

Bdd::connecter();


// Récupération des données GET, POST, et SESSION
if(!isset($_GET["idR"])) {
    // Pb : pas d'id d'utilisateur
    ajouterMessage("Supprimer restaurants : il faut fournir un identifiant de restaurant");
    $titre = "erreur";
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/pied.html.php";
} else {
    $idU = getIdULoggedOn();

    if($idU != 0) {
        $util = UtilisateurDAO::getOneById($idU);

        if($util->isAdministrator()) {
            RestoDAO::supprimer($_GET["idR"]);
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