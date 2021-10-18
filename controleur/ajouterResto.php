<?php

use modele\dao\Bdd;
use modele\metier\Resto;
use modele\dao\RestoDAO;

/**
 * Contrôleur ajouter resto
 * 
 * Vue contrôlée : vueAjouterResto
 * Données POST : mailU, mdpU, pseudoU si le formulaire est validé
 * 
 * Lorsque que le formulaire est vide (1er affichage) ou incomplet : $ajoutReussie = false
 * 
 * @version 07/2021 intégration couche modèle objet
 * @version 08/2021 gestion erreurs
 */
Bdd::connecter();

$ajoutReussie = false;   // booléen indiquant s'il faut afficher le formulaire ou bien confirmer l'inscription
// Données à transmettre à la vue
$titre = "";                    // titre de la vue

// Récupération des données GET, POST, et SESSION
if(isset($_POST["nomR"]) && isset($_POST["numAdr"]) && isset($_POST["voieAdr"]) && isset($_POST["cpR"]) && isset($_POST["villeR"]) && isset($_POST["latitudeDegR"]) && isset($_POST["longitudeDegR"]) && isset($_POST["descR"]) && isset($_POST["horairesR"])) {
    // Si la saisie a été effectuée
    if ($_POST["nomR"] != "" && $_POST["numAdr"] != "" && $_POST["voieAdr"] != "" && $_POST["cpR"] != "" && $_POST["villeR"] != "" && $_POST["descR"] != "" && $_POST["horairesR"] != "") {
        // Si tous les champs sont renseignés
        $nomR = $_POST["nomR"];
        $numAdr = $_POST["numAdr"];
        $voieAdr = $_POST["voieAdr"];
        $cpR = $_POST["cpR"];
        $villeR = $_POST["villeR"];
        $descR = $_POST["descR"];
        $horairesR = $_POST["horairesR"];
        $latitudeDegR = NULL;
        $longitudeDegR = NULL;

        if($_POST["latitudeDegR"] != "") {
            $latitudeDegR = $_POST["latitudeDegR"];
        }

        if($_POST["longitudeDegR"] != "") {
            $longitudeDegR = $_POST["longitudeDegR"];
        }

        // Enregistrement des donnees dans la base de données
        $resto = new Resto(0, $nomR, $numAdr, $voieAdr, $cpR, $villeR, $latitudeDegR, $longitudeDegR, $descR, $horairesR);
        // Insertion en 2 temps : 
        // 1- tout sauf le mot de passe
        $ret = RestoDAO::insert($resto);

        if ($ret) {
            $ajoutReussie = true;
        } else {
            ajouterMessage("Inscription : l'utilisateur n'a pas pu être enregistré.");
        }
    } else {
        ajouterMessage("Inscription : renseigner tous les champs...");
    }
}

// Construction de la vue
if($ajoutReussie) {
    $titre = "Ajout confirmée";
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/vueListeRestos.php";
    require_once "$racine/vue/pied.html.php";
} else {
    // Première demande ou bien erreurs dans le formulaire
    $titre = "Ajout pb";
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/vueAjouterResto.php";
    require_once "$racine/vue/pied.html.php";
}
?>