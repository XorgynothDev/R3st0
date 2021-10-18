<?php
use modele\dao\Bdd;
use modele\dao\UtilisateurDAO;

/**
 * Contrôleur listeRestos
 * Gère l'affichage de la liste de tous les restaurants
 * 
 * @version 09/2021 par NC
 */
Bdd::connecter();

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeUtil =  UtilisateurDAO::getAll();

// Construction de la vue
$titre = "Liste des utilisateurs";
require_once "$racine/vue/entete.html.php";
require_once "$racine/vue/vueListeUtilisateurs.php";
require_once "$racine/vue/pied.html.php";

?>


