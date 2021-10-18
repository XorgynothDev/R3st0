<?php
/**
 * --------------
 * vueListeRestos
 * --------------
 * 
 * @version 07/2021 par NB : intégration couche modèle objet
 * @version 09/2021 par NC : remplace vueResultRecherche
* 
 * Variables transmises par le contrôleur listeRestos ou rechercheresto contenant les données à afficher : 
  ---------------------------------------------------------------------------------------- */
/** @var array $listeUtil les utilisateurs filtrés */
/**
 * Variables supplémentaires :  
  ------------------------- */
/** @var Utilisateur $idU */
/** @var Pseudo $pseudoU */
/** @var Mail $mailU */
?>
<h1>Liste des utilisateurs</h1>

<?php
    foreach($listeUtil as $utilisateur) {
        $pseudoU = $utilisateur->getPseudoU();
        $mailU = $utilisateur->getMailU();

        ?>

        <div class="cardUtil">
            <div class="descrCard">
                <?php

                if($utilisateur->isAdministrator()) {
                    echo $pseudoU . "<font color='orange'> (admin)</font>";
                } else {
                    echo $pseudoU;
                }

                echo "<br>";
                echo $mailU;
                echo "<br>";

                if(!$utilisateur->isAdministrator()) { ?>
                    <a href="./?action=supprimerUtilisateur&idU=<?= $utilisateur->getIdU(); ?>"><button class="deleteUtil">Supprimer</button></a>
                <?php }
                ?>
            </div>
        </div>
        <?php
    } ?>

<?php
?>