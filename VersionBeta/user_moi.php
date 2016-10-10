<?php

Class user {
    public $id;
    public $lastName;
    public $firstName;
    public $birthDate;
    public $adress;
    public $postalCode;
    public $phone;
    public $service;
    public $pdoTP1;

    public function __construct() {
        try {
            $this->pdoTP1 = new PDO("mysql:host=localhost;dbname=TP1; charset=utf8", "usr_tp", "usrtp", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            die("Erreur :" . $e->getMessage());
        }
    }

    public function getData() {
        $lstclts = $this->pdoTP1->query("SELECT * FROM `user`");
        $list = array();
        while ($clts = $lstclts->fetch()) {
            $list[] = $clts;
        }
        $lstclts->closeCursor();
        return $list;
    }
 }
?>
