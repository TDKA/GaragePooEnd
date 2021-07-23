<?php 



class Database {

    //Singleton: (Design Pattern)
    private static $instanceOfPDO = null;

  public static function getPdo() {


    if(self::$instanceOfPDO === null ) {


        self::$instanceOfPDO = new PDO('mysql:host=localhost:3304; dbname=garage;charset=UTF8', 'garage', 'garage', [
        
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
    
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);


    }
    

    
        return self::$instanceOfPDO;
    }



}





?>