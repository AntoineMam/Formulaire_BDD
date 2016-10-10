<?php
//connection à la BD
$pdoDB = new connectDB('localhost', 'TP1', 'utf8', 'usr_tp', 'usrtp');
//Instance de la DB
$DB = $pdoDB->DB();
//creation de l'instance de l'objet user
$user = new user();
$user->pdo = $DB;
//Supression de l'user choisi
if (isset($_GET['id'])) {
    $user->id = $_GET['id'];
    $user->delUser();
}
//creation de l'instance de l'objet service
$service = new service();
$service->pdo = $DB;
//la fonction retourne un tableau dans $serviceList que l'on retrouvera dans le menu deroulant de la vue index.php
$serviceList = $service->getServiceList();
/**
* appel de la methode getUserList
*la fonction retourne un tableau dans userList désactivé ici due au choix du service qui retourne deja la liste
*$userList = $user->getUserList();
* */
//select by service
if (isset($_GET['serviceId'])) {
    $user->service = $_GET['serviceId'];
    $userList = $user->getUserListByService();
    $serviceId = $_GET['serviceId'];
}
else{
    $userList = $user->getUserList();
    $serviceId=0;
}
//Fonction permettant de calculer l'age d'une personne
function dateDifference($date_1, $date_2, $differenceFormat = '%Y') {
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);
}
//Récupération de la date du jour au format SQL
$now = date('Y-m-d');
//Parcours du tableau pour sélectionner les dates de naissances
foreach ($userList as $key => $userDetail) {
    //Ajout à chaque ligne de l'index age sur lequel on calcul l'age
    $userList[$key]['age'] = dateDifference($userDetail['birthDate'], $now);  
}

?>