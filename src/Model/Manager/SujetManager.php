<?php
namespace App\Model\Manager;

use App\Service\AbstractManager;
use App\Service\Session;

class SujetManager extends AbstractManager{

    public function findAll(){
        return $this->getResults(
            "App\Model\Entity\Sujet",
            "SELECT id, title, createdAt, utilisateur_id, categorie_id
            FROM sujet
            ORDER BY createdAt DESC"
        );
    }

    public function findOneById($id){
        return $this->getOneOrNullResult(
            "App\Model\Entity\Sujet",
            "SELECT id, title, createdAt, utilisateur_id, categorie_id
            FROM sujet
            WHERE id = :id",
            ["id" => $id]
        );
    }

    public function findSujetsByCategorie($id){
        return $this->getResults(
            "App\Model\Entity\Sujet",
            "SELECT id, title, createdAt, utilisateur_id, categorie_id
            FROM sujet
            WHERE categorie_id = :id
            ORDER BY createdAt ASC",
            ["id" => $id]
        );
    }


    public function insertSujet($categorie_id,$title)
        {
            return $this->executeQuery(
                "INSERT INTO sujet (title, utilisateur_id, categorie_id)
                VALUES (:title,:utilisateur_id,:categorie_id)",
                [
                    ":title"    => $title,
                    ":utilisateur_id"    => Session::getUser()->getId(),
                    ":categorie_id"    => $categorie_id, 
                ]
            );
        }
}