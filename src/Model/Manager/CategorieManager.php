<?php
namespace App\Model\Manager;

use App\Service\AbstractManager;

class CategorieManager extends AbstractManager{
    public function __construct(){
        parent::getPDO();
    }

    public function findAll(){
        return $this->getResults(
            "App\Model\Entity\Categorie",
            "SELECT id, title
            FROM categorie"
        );
    }

    public function findOneById($id){
        return $this->getOneOrNullResult(
            "App\Model\Entity\Categorie",
            "SELECT id, title
            FROM categorie
            WHERE id = :id",
            ["id" => $id]
        );
    }
}