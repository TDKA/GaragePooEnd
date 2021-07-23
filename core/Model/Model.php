<?php

namespace Model;

use PDO;


abstract class Model {

    protected $pdo;
    protected $table;
   
 

    //PDO
    public function __construct() {
        
        $this->pdo = \Database::getPdo();
     
    }

    /**
     * find garage from its id and 
     * return an array of ONE GARAGE that contains the ID of this garage  or boolean if its the garage don't exist
     * @param int $id
     * @param string $className
     * @return array|bool 
     */
    public function find(int $id, string $className, ? string $table = null ) {

        $sql = "SELECT * FROM  {$this->table} WHERE id = :id" ;


        if(!empty($table)) {

            $sql = "SELECT * FROM $table WHERE id = :id" ;

        }  
            
            
        $requete = $this-> pdo-> prepare($sql);

        $requete->execute(['id' => $id]);

        $item = $requete->fetchObject($className) ;

        return $item; 

    }


        
    /**
     * return an array that contains ALL THE GARAGES from the table garages
     * 
     * @return array
     * 
     */
    public function findAll(string $className) :array {

        $result = $this->pdo->query("SELECT * FROM {$this->table}");

        $items = $result->fetchAll( PDO::FETCH_CLASS, $className );

        return $items;
    }

    

    /**
     * Delete garage by its ID
     * 
     * @param int $garage_id
     * @return void 
     * 
     */
    public function delete(int $id): void {

        $delete = $this-> pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");

        $delete->execute(['id' => $id]);


    }



}               



?>


