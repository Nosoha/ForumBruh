<?php
    $sujet = $response["data"]["sujet"];
    $messages = $response["data"]["messages"];
?>





<div id="Message">
    <H2>Réponses au topic</H2>

    <table>
        <thead>
            <tr>
              <th>Utilisateur</th>
              <th>Date</th>
              <th>message</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($messages as $message){ ?>
                <tr>
                   
                    <td> <img src="<?= $message->getUtilisateur()->getAvatar() ?>" alt=""> Par  <?= $message->getUtilisateur() ?></td>
                    <td>le <?= $message->getCreatedAt() ?><br></td> 
                    <td><?= $message->getText() ?></a></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <div>
    <h3>répondre</h3>
    <form action="?ctrl=home&action=reponseMessage&id=<?= $sujet->getId() ?>" method="post">
        <p> 
            <textarea class="uk-textarea" input type="text"  name="text" id="" placeholder="réponse..." required></textarea>
            
        </p>
        
                                
                                
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <p><input type="submit" value="répondre"></p>
    </form>
    </div>
</div>



