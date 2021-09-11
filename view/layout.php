<?php
    use App\Service\Session;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Exo Forum</title>
</head>
<body>

  

    <nav class="ui borderless main menu">
        <img alt="logo" src="public\img\soccer-ball-png.png">
         <h1 class="item">elastico forum</h1> 
        <a class="item" href="?ctrl=home&action=listCategories">Categorie</a>
        <?php
        if(Session::getUser()){
            ?>
            <a class="item" href="?ctrl=security&action=logout">Déconnexion</a>
            <?php if(Session::getUser()){ ?>
                <a class="item"  href=""><?= Session::getUser()->getUsername() ?></a>
            <?php }
        } else {
            ?>
            <a class="item"  href="?ctrl=security&action=login">Connexion</a>
            <a class="item" href="?ctrl=security&action=register">Inscription</a>
        <?php } ?>
    </nav>

    <?= $content ?>
    
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>