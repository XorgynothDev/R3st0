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
foreach($listeUtil as $idU) {
    $pseudoU = $idU->getPseudoU();
    $mailU = $idU->getMailU();
    ?>

        <div class="descrCard">
            <a href="./index.php?action=detail&idR=<?= $unResto->getIdR() ?>"><?= $unResto->getNomR() ?></a>
            <br />
            <?= $unResto->getNumAdr() ?>
            <?= $unResto->getVoieAdr() ?>
            <br />
            <?= $unResto->getCpR() ?>
            <?= $unResto->getVilleR() ?>
        </div>
        <div class="tagCard">
            <ul id="tagFood">		
                <?php
                foreach ($lesTypesCuisineProposes as $unTC) {
                    ?>
                    <li class="tag"><span class="tag">#</span><?= $unTC->getLibelleTC() ?></li>
                    <?php
                } ?>
            </ul>
        </div>
    </div>
    <?php
}
?>
