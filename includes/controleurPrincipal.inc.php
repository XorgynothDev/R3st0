<?php
/**
 * Fournit le nom du contrôleur principal en fonction de l'action choisie
 * @param string $action libellé de l'action, valeur du paramètre GET "action" de l'URL
 * @return string nom du fichier PHP de la couche contrôleur correspondant à l'action
 */
function controleurPrincipal(string $action) : string {
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["cgu"] = "cgu.php";
    $lesActions["liste"] = "listeRestos.php";
    $lesActions["detail"] = "detailResto.php";
    $lesActions["recherche"] = "rechercheResto.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["updProfil"] = "updProfil.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["aimer"] = "aimer.php";
    $lesActions["noter"] = "noter.php";
    $lesActions["commenter"] = "commenter.php";
    $lesActions["supprimerCritique"] = "supprimerCritique.php";
    $lesActions["supprimerUtilisateur"] = "supprimerUtilisateur.php";
    $lesActions["supprimerTC"] = "supprimerTC.php";
    $lesActions["listeUtilisateurs"] = "listeUtilisateurs.php";
    $lesActions["supprimerResto"] = "supprimerResto.php";
    $lesActions["ajouterResto"] = "ajouterResto.php";
    $lesActions["listeTC"] = "listeTC.php";
    $lesActions["ajouterTC"] = "ajouterTC.php";
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        if($action != "accueil") {
            ajouterMessage("La page " . $action . " n'existe pas !");
        }

        return $lesActions["defaut"];
    }

}