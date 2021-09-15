<?php
namespace App\Model\Entity;

use App\Service\AbstractEntity;

class Categorie extends AbstractEntity{

    private $id;
    private $title;
    private $logo;

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

    public function getLogo(){
        return $this-> logo;
    }

    public function setLogo($logo){
        $this->logo = $logo;
    }
}