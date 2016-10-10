<?php
//Connection à la BD
$pdoDB = new connectDB('localhost', 'TP1', 'utf8', 'usr_tp', 'usrtp');
//Instance de la DB
$DB = $pdoDB->DB();
//Creation de l'instance de l'objet service
$service = new service();
//Connection à la table service
$service->pdo = $DB;
/* Appel de la methode getServiceList de la Class service
 * fonction retourne un tableau que l'in met dans $serviceList */
$serviceList = $service->getServiceList();
//On initialise la variable de retour fausse!
$firstNameError = FALSE;
$lastNameError = FALSE;
$birthDateError = FALSE;
$addressError = FALSE;
$postalCodeError = FALSE;
$phoneError = FALSE;
$serviceIdList = 0;
//On vérifie que le bouton à été appuyé
if (count($_POST) > 0) {
    //Je crée un nouvel utilisateur
    $user = new user();
//Connection à la table user
    $user->pdo = $DB;
    if (empty($_POST['lastName']) || !preg_match('/^[a-z -]+$/i', $_POST['lastName'])) {
        $lastNameError = true;
    } else {
        $lastName = htmlspecialchars($_POST['lastName']);
    }
    if (empty($_POST['firstName']) || !preg_match('/^[a-z -]+$/i', $_POST['firstName'])) {
        $firstNameError = true;
    } else {
        $firstName = htmlspecialchars($_POST['firstName']);
    }
    if (empty($_POST['birthDate']) || !preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})+$/i', $_POST['birthDate'])) {
        $birthDateError = true;
    } else {
        $birthDate  = htmlspecialchars($_POST['birthDate']);
    }
    if (empty($_POST['address'])) {
        $addressError = true;
    } else {
        $address = $_POST['address'] = htmlspecialchars($_POST['address']);
    }
    if (empty($_POST['postalCode']) || !preg_match('/^(2[ab]|0[1-9]|[1-9][0-9])[0-9]{3}+$/i', $_POST['postalCode'])) {
        $postalCodeError = true;
    } else {
        $postalCode  = htmlspecialchars($_POST['postalCode']);
    }
    if (empty($_POST['phone']) || !preg_match('/^0[1-9]([ \.\-\/]?)([0-9]{2}([ \.\-\/]?)){3}[0-9]{2}+$/i', $_POST['phone'])) {
        $phoneError = true;
    } else {
        $phone = $_POST['phone'] = htmlspecialchars($_POST['phone']);
    }
    $serviceIdList = $_POST['serviceId'];
    //Je lui passe les valeures du formulaire
    if (!$firstNameError && !$lastNameError && !$birthDateError && !$addressError && !$postalCodeError && !$phoneError) {
        //Création du tableau des caractères à remplacer  
        $phoneNumberReplaceArray = array(' ', '.', '-', '/');
        //passage de la date fr en SQL
        $date = DateTime::createFromFormat('d/m/Y', $birthDate);
        //Je crée un nouvel utilisateur
        
        //$user->id = $_POST['id'];
        $user->lastName = $lastName;
        $user->firstName = $firstName;
        $user->birthDate = $date->format('Y-m-d');
        $user->address = $address;
        $user->postalCode = $postalCode;
        $user->phone = str_replace($phoneNumberReplaceArray, '', $phone);
        $user->service = $serviceIdList;
//On ajoute l'utilisateur à la base de donnée
        $user->addUser();
                //remise a 0 des variable
        $lastName = '';
        $firstName = '';
        $birthDate = '';
        $address = '';
        $postalCode = '';
        $phone = '';
        $serviceIdList = 0;
    }
}  