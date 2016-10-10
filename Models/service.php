<?php
/**
 * Model de la Table service
 */
Class service{
    
    public $id;
    public $serviceName;
    public $description;
    public $pdo;
    /** 
     * @param int $id
     * @param type $serviceName
     * @param type $description
     **/
    public function __construct($pdo=null, $id = null, $serviceName = '', $description = ''){
        $this->id = $id;
        $this->firstName = $serviceName;
        $this->lastName = $description;
        $this->pdo = $pdo;
        
    }
    /**
     * 
     * @return boolean : fonction qui permet la lecture et de parcourir la table service sous forme de tableau
     */
    public function getServiceList() {
        //Parcours de la table user via requete SQL
        $select = "SELECT * FROM `service`";
        //ici nous utilisons le this->pdo pour rappeler l'objet pdo qui connecte à la base de données
        $queryResult = $this->pdo->query($select);
        $serviceList = $queryResult->fetchAll();
        return $serviceList;
    }
}