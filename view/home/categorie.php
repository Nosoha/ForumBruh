<?php
    $categorie = $response["data"]["categorie"];
    $sujets = $response["data"]["sujets"];
?>

<h1><?= $categorie->getTitle() ?></h1>



<div>
    <table>
        <thead>
            <tr>
                <td>topic</td>
                <td>De</td>
                <td>le</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($sujets as $sujet){ ?>
                <tr>
                    <td><a href=""><?= $sujet->getTitle() ?></a></td>
                    <td><?= $sujet->getUtilisateur() ?></td>
                    <td><?= $sujet->getCreatedAt() ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>