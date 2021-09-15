<?php
    use App\Service\Session;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
                integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" 
                crossorigin="anonymous" />
        <link rel="stylesheet" href="css/uikit.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <link rel="stylesheet" href="public/css/style.css">
        <title>Exo Forum</title>
    </head>
    <body>
    <nav class="ui borderless main menu">
                
            <h1 class="item"> <i class="fas fa-futbol"></i> <a href="index.php"> Elastico Forum</a></h1> 
            <a class="item" href="?ctrl=home&action=listCategories"> <i class="fas fa-list-alt"></i>EQUIPES</a>
            <?php
            if(Session::getUser()){ ?>
                <a class="item"  href="?ctrl=security&action=detail"><i class="fas fa-user"></i><?= Session::getUser()->getUsername() ?></a>
                <a class="item" href="?ctrl=security&action=logout"><i class="fas fa-sign-out-alt"></i></a>
            <?php
            if(Session::isRoleUser("ADMIN")) { ?>
            <a   class="item" href="?ctrl=security&action=listUtilisateur"> <i class="fas fa-users-cog"></i> ADMINISTRATION</a>
            <?php } ?>
            <?php } else { ?>
                <a class="item"  href="?ctrl=security&action=login">Connexion</a>
                <a class="item" href="?ctrl=security&action=register">Inscription</a>
            <?php } ?>
    </nav>

    

    
        <?= $content ?>
    
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>


<footer>
<p> © Nosoha </p>
</footer>