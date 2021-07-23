<?php

namespace Controllers;

class Make extends Controller {

    protected $modelName = \Model\Make::class;

    /**
     * 
     * 
     * 
     * 
     */

    public function index()  {

        $makes = $this->model->findAll();
    
    
        $titlePage = "Gateaux";

        \Rendering::render("gateaux/gateaux",
                compact('makes', 'titlePage')
            );
            
        }
    /***
     * 
     * Add one make to the cake or to the receipt
     * 
     * 
     */
    public function add() {
        
        $gateau_id = null;
        $recette_id = null;
        $user_id = null;

        //check if gateauID is empty

        if(!empty($_POST['gateauId']) && ctype_digit($_POST['gateauId']) ) {

            $gateau_id = $_POST['gateauId'];
            
        }
        //check if recetteId is empty 
        if(!empty($_POST['recetteId']) && ctype_digit($_POST['recetteId']) ) {

            $recette_id = $_POST['recetteId'];
            
        }
        //check if userId is empty 
        if(!empty($_POST['userId']) && ctype_digit($_POST['userId']) ) {

            $user_id = $_POST['userId'];
            
        }

        $modelMake = new \Model\Make();
        
        //Insert make for recette
        if(!$gateau_id) {

            $modelMake ->insert('recette', $recette_id, $user_id );

            $modelRecette = new \Model\Recette();
            $recette = $modelRecette->find($recette_id, \Model\Recette:: class);
            
            $gateau_id = $recette->gateau_id;


        }
        //Insert make for gateau
        else {
            $modelMake->insert('gateau', $gateau_id, $user_id);
        }


        \Http::redirect("index.php?controller=gateau&task=show&id=$gateau_id");

    }

    // /**
    //  * 
    //  * 
    //  * 
    //  */
    // public function remove() {
        
    // }


}



?>