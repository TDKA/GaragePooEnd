<?php

    // Besoin une function comme parametre
    spl_autoload_register(function($nomDeClass){

        // var_dump($nomDeClass);

        // str_replace - 
        
        //require_once "core/Controllers/Garage.php";

        $nomDeClass = str_replace("\\", "/", $nomDeClass);
   
        
        require_once "core/$nomDeClass.php";

    });



?>