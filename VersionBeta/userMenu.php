<?php
//Connection à la base de donnée
$pdoDB = new connectDB('localhost', 'TP1', 'utf8', 'usr_tp', 'usrtp');
$DB = $pdoDB->DB();
//creation de l'instance de l'objet user
$user = new user();
$user->pdo = $DB;
//appel de la methode getUserList
$userListSearch = $user->getUserList();
//Filtre du menu deroulant

?>