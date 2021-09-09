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
                    <td>Par|<?= $message->getUtilisateur() ?></td>
                    <td>|le<?= $message->getCreatedAt() ?><br></td> 
                    <td>|<?= $message->getText() ?></a></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>