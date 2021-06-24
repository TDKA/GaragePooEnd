<?php


namespace Controllers;

abstract class Controller {


    protected  $model;

    //name of the CLASS Garage
    protected $modelName;

     public function __construct() {

        //Create new instance of model
        $this->model = new $this->modelName();

     }

}


?>