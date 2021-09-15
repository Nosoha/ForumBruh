<?php
    $categories = $response["data"]["categories"];
?>


<div id="categorie">
    <h1>Liste des équipes</h1>
    <div id="cat">    
    <?php
        foreach($categories as $categorie){ ?>
        <a href="?ctrl=home&action=detailsCategorie&id=<?= $categorie->getId() ?>"> <img src="<?= $categorie->getLogo() ?>" alt=""></a><br>
    <?php } ?>
    </div>
</div>

