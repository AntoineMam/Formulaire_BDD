<?php

/**
 * Model de la Table User
 */
Class user {

    public $id;
    public $lastName;
    public $firstName;
    public $birthDate;
    public $adress;
    public $postalCode;
    public $phone;
    public $service;
    public $pdo;
    public $idSearch;

    /**
     * 
     * @param  $lastName $id et toutes les autres varibles ci dessous
     */
    public function __construct($pdo = null, $id = null, $firstName = '', $lastName = '', $birthDate = 2000 - 01 - 01, $adress = '', $postalCode = '', $phone = '', $service = 0) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->adress = $adress;
        $this->postalCode = $postalCode;
        $this->phone = $phone;
        $this->service = $service;
        $this->pdo = $pdo;
    }
    /**
     * Connection avec la base de donée et verification de erreur
     */
    public function getUserList() {
        //Parcours de la table user via requete SQL
        $select = "SELECT  `us`.*,`se`.`serviceName` FROM `user` `us` INNER JOIN `service` `se` ON `us`.`service` = `se`.`id`;";
        //ici nous utilisons le this->pdo pour rappeler l'objet pdo qui connecte à la base de données
        $queryResult = $this->pdo->query($select);
        $userList = $queryResult->fetchAll();
        return $userList;
    }

    /**
     * Fonction pour ajouter un user (INSERT INTO)
     */
    public function addUser() {
        $insert = 'INSERT INTO `user` (`lastName`, `firstName`, `birthDate`, `address`, `postalCode`, `phone`, `service`) VALUES (:lastName, :firstName, :birthDate, :address, :postalCode, :phone, :service)';
        $queryResult = $this->pdo->prepare($insert);
        $queryResult->bindValue(":lastName", $this->lastName, PDO::PARAM_STR);
        $queryResult->bindValue(":firstName", $this->firstName, PDO::PARAM_STR);
        $queryResult->bindValue(":birthDate", $this->birthDate, PDO::PARAM_STR);
        $queryResult->bindValue(":address", $this->address, PDO::PARAM_STR);
        $queryResult->bindValue(":postalCode", $this->postalCode, PDO::PARAM_STR);
        $queryResult->bindValue(":phone", $this->phone, PDO::PARAM_STR);
        $queryResult->bindValue(":service", $this->service, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    /**
     * Suppression d'un utilisateur défini
     */
    public function delUser() {
        $delUser = 'DELETE FROM `user` WHERE `id` = :id';
        $delResult = $this->pdo->prepare($delUser);
        $delResult->bindValue(":id", $this->id, PDO::PARAM_INT);
        return $delResult->execute();
    }
    /**
     * 
     * @return array retourne la liste des users selectionnés par leur service
     */
    public function getUserListByService() {
       //ici on retrouve un liaison pour les différents id
       $select = 'SELECT `us`.*,`se`.`serviceName` FROM `user` AS `us` LEFT JOIN `service` AS `se` ON `se`.`id` = `us`.`service` WHERE `us`.`service` = :service';
       $queryResult = $this->pdo->prepare($select);
       $queryResult->bindValue(':service', $this->service, PDO::PARAM_INT);
       if ($queryResult->execute()) {
           //si la méthode execute de PDO réussi, on retourne les résultat
           return $queryResult->fetchAll(PDO::FETCH_ASSOC);
       } else {
           //sinon on crée un tableau vide et on le retourne pour éviter des erreurs PHP
           $queryEmpty = array();
           return $queryEmpty;
       }
   }
       public function searchUser() {
//Requete de parcourt de la table Clients par id
        $listusr = $this->pdo->prepare("SELECT * FROM `user` WHERE `id`= :id");
        $listusr->execute(array("id" => $id));
        return $listusr->fetch();
}
}