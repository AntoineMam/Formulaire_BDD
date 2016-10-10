<?php

/* * ********************************************
 * Ce fichier contient toutes les fonctions****
 * utiles à l"application**********************
 * ******************************************* */

class form {

    public $data;
    public $pdoTP1;

//Constructeur de la class form :
    public function __construct($data = (array())) {
        try {
            $this->pdoTP1 = new PDO("mysql:host=localhost;dbname=TP1; charset=utf8", "usr_tp", "usrtp", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            die("Erreur :" . $e->getMessage());
        }
        $this->data = $data;
    }

    /**
     * Fonction de Recherche d"USER
     * */
    public function searchUser() {
//Requete de parcourt de la table Clients par Nom
        $listusr = $this->pdoTP1->prepare("SELECT * FROM `user` WHERE `lastName`= :lastName");
//Recherche du lastName client
//Verification que le champs est remplit
        if (isset($_POST["Recherche"])) {
            $lastName = $_POST["Recherche"];
        } else {
            $lastName = "";
        }
        $listusr->execute(array("lastName" => $lastName));
        return $listusr->fetch();
    }

//Submit des champs remplit pour l"insertion d"un nouvel utilisateur
    public function submitUser() {
//Verification des Champs présent dans le formulaire
        if (count($_POST) > 3) {
            if (isset($_POST["id"])) {
                $id = $_POST["id"];
            } else {
                $id = "";
            }
            if (isset($_POST["lastName"])) {
                $lastName = $_POST["lastName"];
            } else
                $lastName = "";
            if (isset($_POST["firstName"])) {
                $firstName = $_POST["firstName"];
            } else {
                $firstName = "";
            }
            if (isset($_POST["birthDate"])) {
                $birthDate = $_POST["birthDate"];
            } else {
                $birthDate = "1900-01-01";
            }
            if (isset($_POST["address"])) {
                $address = $_POST["address"];
            } else {
                $address = "";
            }
            if (isset($_POST["postalCode"])) {
                $postalCode = $_POST["postalCode"];
            } else {
                $postalCode = "";
            }
            if (isset($_POST["phone"])) {
                $phone = $_POST["phone"];
            } else {
                $phone = "";
            }
            if (isset($_POST["service"])) {
                $service = $_POST["service"];
            } else {
                $service = 0;
            }
//Préparation de l'ajout des données
//$listusr2=$pdoTP1->prepare("UPDATE `user` SET `lastName`=:lastName , `firstName`=:firstName , `birthDate`= :birthDate , `address`= :address , `postalCode`= :postalCode , `phone`= :phone, `service`= :service WHERE `id`= :id");
//Préparation de l"insertion des données et sécurisation de celle-ci
            $listusr2 = $this->pdoTP1->prepare("INSERT INTO `user` (`lastName`, `firstName`, `birthDate`, `address`, `postalCode`, `phone`, `service`) VALUES (:lastName, :firstName, :birthDate, :address, :postalCode, :phone, :service)");
//$listusr2->bindValue(":id", $id, PDO::PARAM_INT);
            $listusr2->bindValue(":lastName", $lastName, PDO::PARAM_STR);
            $listusr2->bindValue(":firstName", $firstName, PDO::PARAM_STR);
            $listusr2->bindValue(":birthDate", $birthDate, PDO::PARAM_STR);
            $listusr2->bindValue(":address", $address, PDO::PARAM_STR);
            $listusr2->bindValue(":postalCode", $postalCode, PDO::PARAM_INT);
            $listusr2->bindValue(":phone", $phone, PDO::PARAM_INT);
            $listusr2->bindValue(":service", $service, PDO::PARAM_INT);
//Execution de la requête d"envoie des données
            $resultat = $listusr2->execute();
            if ($resultat = true) {
                echo "Formulaire transmit";
            } else {
                echo "Verifier les informations";
            };
            var_dump($resultat);
            $listusr2->closeCursor();
            unset($_POST);
        }
    }
/**
 * Fonction permettant la modification du formulaire existant apres recherche
 */
    public function modifyUser() {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
        } else {
            $id = "";
        }
        if (isset($_POST["lastName"])) {
            $lastName = $_POST["lastName"];
        } else
            $lastName = "";
        if (isset($_POST["firstName"])) {
            $firstName = $_POST["firstName"];
        } else {
            $firstName = "";
        }
        if (isset($_POST["birthDate"])) {
            $birthDate = $_POST["birthDate"];
        } else {
            $birthDate = "1900-01-01";
        }
        if (isset($_POST["address"])) {
            $address = $_POST["address"];
        } else {
            $address = "";
        }
        if (isset($_POST["postalCode"])) {
            $postalCode = $_POST["postalCode"];
        } else {
            $postalCode = "";
        }
        if (isset($_POST["phone"])) {
            $phone = $_POST["phone"];
        } else {
            $phone = "";
        }
        if (isset($_POST["service"])) {
            $service = $_POST["service"];
        } else {
            $service = 0;
        }
        $listusrMdf = $this->pdoTP1->prepare("UPDATE `user` SET `lastName` = :lastName , `firstName` = :firstName , `birthDate` = :birthDate , `address` = :address , `postalCode` = :postalCode , `phone` = :phone , `service`= :service WHERE `id` = :id'");
        $listusrMdf->bindValue(":id", $id, PDO::PARAM_INT);
        $listusrMdf->bindValue(":lastName", $lastName, PDO::PARAM_STR);
        $listusrMdf->bindValue(":firstName", $firstName, PDO::PARAM_STR);
        $listusrMdf->bindValue(":birthDate", $birthDate, PDO::PARAM_STR);
        $listusrMdf->bindValue(":address", $address, PDO::PARAM_STR);
        $listusrMdf->bindValue(":postalCode", $postalCode, PDO::PARAM_INT);
        $listusrMdf->bindValue(":phone", $phone, PDO::PARAM_INT);
        $listusrMdf->bindValue(":service", $service, PDO::PARAM_INT);
//Execution de la requête d"envoie des données
        $resultatMdf = $listusrMdf->execute();
        if ($resultatMdf = true) {
            echo "Formulaire modifié";
        } else {
            echo "Verifier les informations";
        };
        var_dump($resultatMdf);
        $listusrMdf->closeCursor();
    }
}
?>