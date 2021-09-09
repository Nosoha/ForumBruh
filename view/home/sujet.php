<?php
    $categorie = $response["data"]["categorie"];
    $sujets = $response["data"]["sujets"];
    
?>


<h1><?= $categorie->getTitle() ?></h1>
<h2>Liste des Sujets</h2>


<div>
    <table>
        <thead>
            <tr>
               
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($sujets as $sujet){ ?>
                <tr>
                    <td><a href="?ctrl=home&action=detailsMessage&id=<?= $sujet->getId() ?>"><?= $sujet->getTitle() ?></a></td>
                    <td>De <?= $sujet->getUtilisateur() ?></td>
                    <td>        Créer le :<?= $sujet->getCreatedAt() ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>