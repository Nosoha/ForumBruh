<?php
    $categorie = $response["data"]["categorie"];
    $sujets = $response["data"]["sujets"];
    
?>

<div id ="sujet">
    <h1><?= $categorie->getTitle() ?></h1>
    <h2><img src="<?= $categorie->getLogo() ?>" alt=""></h2>

    <h3>Liste des Sujets</h3>


    <div id="tableauSujet">
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
                        <td><img src="<?= $sujet->getUtilisateur()->getAvatar() ?>" alt="">  <?= $sujet->getUtilisateur()  ?>  </td>
                        <td>Créer le :<?= $sujet->getCreatedAt() ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>

    <h3>ajouter un sujet</h3>
    <form action="?ctrl=home&action=newSujet&id=<?= $categorie->getId() ?>" method="post">
        <p>
            <input type="text" name="title" id="" placeholder="sujet..." required>
        </p>

        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <p><input type="submit" value="nouveau sujet"></p>
    </form>
    
</div>