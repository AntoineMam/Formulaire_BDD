<?php
//Connection à la BD
$pdoDB = new connectDB('localhost', 'TP1', 'utf8', 'usr_tp', 'usrtp');
//Instance de la DB
$DB = $pdoDB->DB();
//Creation de l'instance de l'objet user
$user = new user();
//Connection à la table user
$user->pdo = $DB;
//Creation de l'instance de l'objet service
$service = new service();
//Connection à la table service
$service->pdo = $DB;
//Appel de la methode getServiceList de la Class service
//La fonction retourne un tableau que l'in met dans $serviceList
$serviceList = $service->getServiceList();

/*
 * Fonction d'ajout d'user
 */

//On vérifie que le bouton à été appuyé (count de 3 lignes minimum dans le POST)
if (count($_POST) > 3) {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }
    if (isset($_POST["lastName"])) {
        $lastName = $_POST["lastName"] = htmlspecialchars($_POST['lastName']);
    }
    if (isset($_POST["firstName"])) {
        $firstName = $_POST["firstName"] = htmlspecialchars($_POST['firstName']);
    }
    if (isset($_POST["birthDate"])) {
        $birthDate = $_POST["birthDate"] = htmlspecialchars($_POST['birthDate']);
    } else {
        $birthDate = "1900-01-01";
    }
    if (isset($_POST["address"])) {
        $address = $_POST["address"] = htmlspecialchars($_POST['address']);
    }
    if (isset($_POST["postalCode"])) {
        $postalCode = $_POST["postalCode"] = htmlspecialchars($_POST['postalCode']);
    }
    if (isset($_POST["phone"])) {
        $phone = $_POST['phone'] = htmlspecialchars($_POST['phone']);
    }
    if (isset($_POST["service"])) {
        $service = $_POST["service"];
    } else {
        $service = 0;
    }
    //On passe les valeures du formulaire dans la BD
    $user->id = $id;
    $user->lastName = $lastName;
    $user->firstName = $firstName;
    $user->birthDate = $birthDate;
    $user->address = $address;
    $user->postalCode = $postalCode;
    $user->phone = $phone;
    $user->service = $service;
    //On ajoute l'utilisateur à la base de donnée
    $user->addUser();
} else {
    echo 'Veillez a bien remplir votre formulaire!!!';
}