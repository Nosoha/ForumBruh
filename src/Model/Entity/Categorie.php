<?php
namespace App\Model\Entity;

use App\Service\AbstractEntity;

class Categorie extends AbstractEntity{

    private $id;
    private $titre;

    public function __construct($data){
        parent::hydrate($data, $this);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }
}