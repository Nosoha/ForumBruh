  
<?php
    $categories = $response["data"]["categories"];
?>
<h1>Bienvenue</h1>

<div>
<?php
    foreach($categories as $categorie){ ?>
    <a href="?ctrl=home&action=detailsCategorie&id=<?= $categorie->getId() ?>"><?= $categorie->getTitle() ?></a><br>
<?php }
?>
</div>
