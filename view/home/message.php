<?php
    $sujet = $response["data"]["sujet"];
    $messages = $response["data"]["messages"];
    
?>


<H2>Réponses au topic</H2>



<div>
    <table>
        <thead>
            <tr>
               
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($messages as $message){ ?>
                <tr>
                    <td>Par  <?= $message->getUtilisateur() ?></td>
                    <td>le <?= $message->getCreatedAt() ?><br></td> 
                    <td><?= $message->getText() ?></a></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>

<div>
<h3>répondre</h3>
<form action="?ctrl=home&action=reponseMessage&id=<?= $sujet->getId() ?>" method="post">
    <p>
        <input type="text" name="text" id="" placeholder="réponse..." required>
    </p>

    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
    <p><input type="submit" value="répondre"></p>
</form>
</div>