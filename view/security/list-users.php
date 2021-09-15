<?php
//on récupère la partie data de la response traitée par index.php
   $users = $response["data"]['users'];

?>


<div id="ListeUser">
      <table>
            <tbody>
                <h1>Liste Utilisateurs</h1>

                <?php 
                    foreach($users as $user){
                        ?>
                    
                    <tr>
                    
                        <td>ID : <?= $user->getId() ?>| NOM : <?= $user->getUsername() ?>| Email :<?= $user->getEmail() ?></td>
                        
                    
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

        
        <a  href="https://th.bing.com/th/id/OIP.XpG8WgOzJF_u53newga2NwHaEK?pid=ImgDet&rs=1">Modifier un utilisateur <i class="fas fa-users-cog"></i></a>
</div>
