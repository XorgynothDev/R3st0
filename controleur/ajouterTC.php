<?php

use modele\dao\Bdd;
use modele\metier\TypeCuisine;
use modele\dao\TypeCuisineDAO;

/**
 * Contrôleur ajouter type de cuisine
 * 
 * Vue contrôlée : vueAjouterTC
 * Données POST : libelleTC si le formulaire est validé
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
if(isset($_POST["libelleTC"])) {
    // Si la saisie a été effectuée
    if ($_POST["libelleTC"]) {
        // Si tous les champs sont renseignés
        $libelleTC = $_POST["libelleTC"];

        // Enregistrement des donnees dans la base de données
        $TC = new TypeCuisine(0, $libelleTC);
        $ret = TypeCuisineDAO::insert($TC);

        if($ret) {
            $ajoutReussie = true;
        } else {
            ajouterMessage("Ajout : le type de cuisine n'a pas pu être ajouté.");
        }
    } else {
        ajouterMessage("Ajout : renseigner tous les champs...");
    }
}

// Construction de la vue
if($ajoutReussie) {
    header('Location: ./?action=listeTC');
} else {
    // Première demande ou bien erreurs dans le formulaire
    $titre = "Ajout pb";
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/vueAjouterTC.php";
    require_once "$racine/vue/pied.html.php";
}
?>