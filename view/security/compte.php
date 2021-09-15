<?php
    use App\Service\Session;
?>
<?php $user = $response["data"]["user"]; ?>

<div id ="Compte">
    <h1>Information Compte</h1>
    <img src="<?= $user->getAvatar() ?>" alt="">
    <p> Pseudo : <?=$user->getUsername()?></p>
    <p> Email : <?=$user->getEmail()?></p>
    <h2>Role</h2>
    <p> Privilege :<?=$user->getRole()?></p>
    <h3>compte crée le :</h3>
    <p> <?=$user->getCreatedAt()?></p>

   
</div>


