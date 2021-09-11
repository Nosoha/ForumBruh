<?php
//on récupère la partie data de la response traitée par index.php
   $users = $response["data"]['users'];
   $title = $response["data"]['title'];

?>

<h1><?= $title ?></h1>
<div>
<?php
    foreach($users as $user){
        ?>
        <p>ID : <?= $user->getId() ?>, NOM : <?= $user->getUsername() ?></p>
        <p><?= $user->getCreatedAt() ?></p>
        <?php
    }
?>
</div>