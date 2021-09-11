<?php
namespace App\Model\Manager;

use App\Service\AbstractManager;
use App\Service\Session;

class MessageManager extends AbstractManager{
  
    public function findAll(){
        return $this->getResults(
            "App\Model\Entity\Message",
            "SELECT id, text, createdAt, utilisateur_id, sujet_id
            FROM message"
        );
    }

    public function findOneById($id){
        return $this->getOneOrNullResult(
            "App\Model\Entity\Sujet",
            "SELECT id, text, createdAt, utilisateur_id, sujet_id
            FROM message
            WHERE id = :id",
            ["id" => $id]
        );
    }

    public function findMessagesBySujet($id){
        return $this->getResults(
            "App\Model\Entity\Message",
            "SELECT id, text, createdAt, utilisateur_id, sujet_id
            FROM message
            WHERE sujet_id = :id
            ORDER BY createdAt ASC",
            ["id" => $id]
        );
    }

    public function insertMessage($sujet_id,$text)
        {
            return $this->executeQuery(
                "INSERT INTO message (text, utilisateur_id, sujet_id)
                VALUES (:text,:utilisateur_id,:sujet_id)",
                [
                    ":text"    => $text,
                    ":utilisateur_id"    => Session::getUser()->getId(),
                    ":sujet_id"    => $sujet_id, 
                ]
            );
        }
}