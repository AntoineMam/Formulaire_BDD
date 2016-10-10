<?php
//connection à la BD
$pdoDB = new connectDB('localhost', 'TP1', 'utf8', 'usr_tp', 'usrtp');
//Instance de la DB
$DB = $pdoDB->DB();
//creation de l'instance de l'objet user
$service = new service();
$service->pdo = $DB;
$serviceList = $service->getServiceList();