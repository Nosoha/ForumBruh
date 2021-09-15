<?php
namespace App\Controller;

use App\Model\Manager\UtilisateurManager;
use App\Service\AbstractController;
use App\Service\Session;

class SecurityController extends AbstractController
{
    public function __construct()
    {
        $this->utilisateurManager = new UtilisateurManager();
    }
    /**
     * 
     */
    public function index(): array
    {
        return $this->login();
    }

    /**
     * 
     */
    public function login(): array
    {
        if(!empty($_POST)){
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, [
                "options" => [
                    "regexp" => "/^[A-Za-z]{4,}/"
                ]
            ]);
            
            if($email && $password){
                
                $user = $this->utilisateurManager->findUtilisateurByEmail($email);
                // echo $user->getId(); die;
                if($user){
                    
                    if(password_verify($password, $this->utilisateurManager->findPasswordById($user->getId()))){
                    
                        Session::setUser($user);
                        $this->addFlash("success", $user->getUsername()." est connecté !");
                        $this->redirectTo("?ctrl=home&action=listCategories"); 
                    }
                }
                else $this->addFlash("error", "Mauvais e-mail ou mot de passe !");
            }
            else $this->addFlash("error", "Les champs sont obligatoires !");
        }

        return $this->render("security/login.php"); 
    }

    public function register()
    {
        if(!empty($_POST)){
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, [
                "options" => [
                    "regexp" => "/^[A-Za-z]{4,}/"
                ]
            ]);
            $password_r = filter_input(INPUT_POST, "password_repeat", FILTER_DEFAULT);
            

            if($username && $email && $password && $password_r){

                if($password === $password_r){

                    
                    if(!$this->utilisateurManager->verifyUtilisateur($email, $username)){
                        $hash = password_hash($password, PASSWORD_ARGON2I);
                        
                        // echo "ok"; die;
                        if($this->utilisateurManager->insertUtilisateur($username, $email, $hash)){
                            $this->addFlash("success", "Inscription réussie !!!");
                            $this->redirectTo("?ctrl=security&action=login");
                        }
                        else $this->addFlash("error", "Erreur 500, réessayez ultérieurement !");
                    }
                    else $this->addFlash("error", "Cet email ou ce pseudo sont déjà utilisés, choisissez en un autre");
                }
                else $this->addFlash("error", "Les mots de passe ne correspondent pas !");
            }
            else $this->addFlash("error", "Les champs sont obligatoires");
        }

        return $this->render("security/register.php"); 
    }
    
    public function detail(){
        
        $user = Session::getUser();
        return $this->render("security/compte.php", 
        [
            "user" => $user
        ]);
    }

    public function listUtilisateur(){
        $username = $this->utilisateurManager->findAll();

        return $this->render("security/list-users.php",
            ["users" => $username]
        );
    }

    public function logout()
    {
        $this->logoutUser();
        $this->addFlash("success", "A bientôt !");
        $this->redirectTo('index.php');
    }

    
}