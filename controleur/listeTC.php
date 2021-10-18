<?php
use modele\dao\Bdd;
use modele\dao\TypeCuisineDAO;

/**
 * Contrôleur listeTC
 * Gère l'affichage de la liste de tous les types de cuisines
 *
 * @version 09/2021 par NC
 */
Bdd::connecter();

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
$listeTC =  TypeCuisineDAO::getAll();

// Construction de la vue
$titre = "Liste des types de cuisines";
require_once "$racine/vue/entete.html.php";
require_once "$racine/vue/vueListeTC.php";
require_once "$racine/vue/pied.html.php";

?>


