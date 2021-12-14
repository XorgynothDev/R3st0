<?php

use modele\dao\Bdd;
use modele\metier\Resto;
use modele\dao\RestoDAO;
use modele\dao\TypeCuisineDAO;

/**
 * Contrôleur ajouter resto
 * 
 * Vue contrôlée : vueUpdResto
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
if(isset($_POST["nomR"]) && isset($_POST["numAdr"]) && isset($_POST["voieAdr"]) && isset($_POST["cpR"]) && isset($_POST["villeR"]) && isset($_POST["latitudeDegR"]) && isset($_POST["longitudeDegR"]) && isset($_POST["descR"]) && isset($_POST["horairesR"]) && isset($_POST["addLstidTC"])) {
    // Si la saisie a été effectuée
    if ($_POST["nomR"] != "" && $_POST["numAdr"] != "" && $_POST["voieAdr"] != "" && $_POST["cpR"] != "" && $_POST["villeR"] != "" && $_POST["descR"]/* != "" && $_POST["horairesR"] != "" && $_POST["photoR"] != ""*/) {
        // Si tous les champs sont renseignés
        $nomR = $_POST["nomR"];
        $numAdr = $_POST["numAdr"];
        $voieAdr = $_POST["voieAdr"];
        $cpR = $_POST["cpR"];
        $villeR = $_POST["villeR"];
        $descR = $_POST["descR"];
        $horairesR = NULL;
        $latitudeDegR = NULL;
        $longitudeDegR = NULL;
        //$photoR = $_POST["photoR"];
        $listTC = $_POST["addLstidTC"];
        $listTC = $_POST["addLstidTC"];

        if($_POST["horairesR"] != "") {
            $horairesR = $_POST["horairesR"];
        }

        if($_POST["latitudeDegR"] != "") {
            $latitudeDegR = $_POST["latitudeDegR"];
        }

        if($_POST["longitudeDegR"] != "") {
            $longitudeDegR = $_POST["longitudeDegR"];
        }

        // Enregistrement des donnees dans la base de données
        $resto = new Resto(0, $nomR, $numAdr, $voieAdr, $cpR, $villeR, $latitudeDegR, $longitudeDegR, $descR, $horairesR);
        $ret = RestoDAO::insert($resto, $listTC/*, $photoR*/);

        if($ret) {
            $ajoutReussie = true;
        } else {
            ajouterMessage("Ajout : le resto n'a pas pu être ajouté.");
        }
    } else {
        ajouterMessage("Ajout : renseigner tous les champs...");
    }
}

// Construction de la vue
if($ajoutReussie) {
    header('Location: ./?action=liste');
} else {
    // Première demande ou bien erreurs dans le formulaire
    $titre = "Ajout pb";

    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/vueUpdResto.php";
    require_once "$racine/vue/pied.html.php";
}
?>