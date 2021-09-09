<?php
namespace App\Controller;

use App\Model\Entity\Message;
use App\Model\Manager\CategorieManager;
use App\Model\Manager\SujetManager;
use App\Model\Manager\MessageManager;
use App\Service\AbstractController;

class HomeController extends AbstractController
{
    public function __construct(){
        $this->categorieManager = new CategorieManager();
        $this->sujetManager = new SujetManager();
        $this->messageManager = new MessageManager();
    }
    
    public function index(): array
    {
        return $this->render("home/home.php");
    }

    public function listCategories(){
        $categories = $this->categorieManager->findAll();

        return $this->render("home/home.php",
            ["categories" => $categories]
        );
    }

    public function detailsCategorie($id){
        $categorie = $this->categorieManager->findOneById($id);
        $sujets = $this->sujetManager->findSujetsByCategorie($id);

        return $this->render("home/sujet.php",
            ["categorie" => $categorie,   
            "sujets" => $sujets]
        );
    }

    public function detailsMessage($id){
        $sujet = $this->sujetManager->findOneById($id);
        $messages = $this->messageManager->findMessagesBySujet($id);

        return $this->render("home/message.php",
            ["sujet" => $sujet,  
            "messages" => $messages]
        );
    }
}