<?php
namespace App\Model\Manager;

use App\Service\AbstractManager;

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
}