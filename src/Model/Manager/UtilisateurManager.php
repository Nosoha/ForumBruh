<?php
namespace App\Model\Manager;

use App\Service\AbstractManager;

class UtilisateurManager extends AbstractManager
{
    public function __construct(){
        parent::getPDO();
    }

    public function getUtilisateurs()
    {
        return $stmt->getResults(
            "App\Model\Entity\Utilisateur",
            "SELECT * FROM utilisateur"
        );
    }

        public function findAll()
        {
            return $this->getResults(
                "App\Model\Entity\Utilisateur",
                "SELECT * FROM utilisateur"
            );
        }
    
        public function findOneById($id)
        {
            return $this->getOneOrNullResult(
                "App\Model\Entity\Utilisateur",
                "SELECT * FROM utilisateur WHERE id = :id",//en faisant CA
                [':id' => $id]//et tu auras besoin de CA
            );
        }
    
        public function findUtilisateurByEmail($email)
        {
            return $this->getOneOrNullResult(
                "App\Model\Entity\Utilisateur",
                "SELECT * FROM utilisateur WHERE email = :email",
                [':email' => $email]
            );
        }
    
        public function findPasswordById($id)
        {
            return $this->getOneOrNullValue(
                "SELECT password FROM utilisateur WHERE id = :id",
                [":id" => $id]
            );
        }
    
        public function verifyUtilisateur($email, $username)
        {
            $email = strtolower($email);
            $username = strtolower($username);
    
            return $this->getOneOrNullValue(
                "SELECT id FROM utilisateur WHERE LOWER(email) = :email OR LOWER(username) = :username",
                [":email" => $email, ":username" => $username]
            );
        }
    
        public function insertUtilisateur($username,$email, $password)
        {
            return $this->executeQuery(
                "INSERT INTO utilisateur (username, email, password)
                VALUES (:username, :email, :password)",
                [
                    ":email"    => $email, 
                    ":username"   => $username, 
                    ":password" => $password,
                    
                ]
            );
        }
    }