<?php
namespace App\Model\Manager;

use App\Service\AbstractManager;

class CategorieManager extends AbstractManager{
    
    public function findAll(){
        return $this->getResults(
            "App\Model\Entity\Categorie",
            "SELECT id, title , logo
            FROM categorie"
        );
    }

    public function findOneById($id){
        return $this->getOneOrNullResult(
            "App\Model\Entity\Categorie",
            "SELECT id, title , logo 
            FROM categorie
            WHERE id = :id",
            ["id" => $id]
        );
    }
}