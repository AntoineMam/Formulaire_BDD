<?php

/**
 * Class de connection à la BD
 */
class connectDB {

    private $pdo;
    public $localhost;
    public $TP1;
    public $utf8;
    public $usr_tp;
    public $usrtp;

    /**
     * Constructeur de la class connectDB 
     */
    public function __construct($localhost,$TP1,$utf8,$usr_tp,$usrtp) {
        $this->localhost = 'localhost';
        $this->TP1 = 'TP1';
        $this->utf8= 'utf8';
        $this->usr_tp= 'usr_tp';
        $this->usrtp= 'usrtp';
    }

    function DB() {
        try {
            $this->pdo = new PDO("mysql:host=$this->localhost;dbname=$this->TP1; charset=$this->utf8", "$this->usr_tp", "$this->usrtp", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $ex) {
            die("Erreur :" . $ex->getMessage());
        }
        return $this->pdo;
    }

}

?>