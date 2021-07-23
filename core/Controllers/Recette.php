<?php

    namespace Controllers;
    

    class Recette extends Controller {


    protected $modelName = \Model\Recette::class;


    /**
     * 
     * Delete Recette
     * 
     */
    public function suppr() {

        if( !empty($_POST['id']) && ctype_digit($_POST['id'])  ) {
            
            $recette_id = $_POST['id'];


           if(!$recette_id) {

                die("Sorry, you have to add id to the URL");
           } 

           //find if the RECETTE EXIST
           $recette = $this->model->find($recette_id, $this->modelName);  

           //
           $gateau_id = $recette->gateau_id;

           if(!$recette) {

                die("Sorry, this recette don't exist");

           }

           //Delete recette
           $this->model->delete($recette_id);


          \Http::redirect("index.php?controller=gateau&task=show&id=$gateau_id"); 



        }

}

    /**
     * 
     * Delete Recette
     * 
     */
    public function supprApi() {

        if( !empty($_POST['id']) && ctype_digit($_POST['id'])  ) {
            
            
            $recette_id = $_POST['id'];

           if(!$recette_id) {

                die("Sorry, you have to add id to the URL");
           } 

           //find if the RECETTE EXIST
           $recette = $this->model->find($recette_id, $this->modelName);  

           //
           $gateau_id = $recette->gateau_id;

           if(!$recette) {

                die("Sorry, this recette don't exist");

           }

           //Delete recette
           $this->model->delete($recette_id);

                    header('Access-Control-Allow-Origin: *');

                    $message = "Delete was successfull";

                    echo json_encode($message);
                 

        }

}

    
        /**
         * 
         * Create RECETTE that is connect to a CAKE
         * 
         */

public function create()
    {
         $userModel = new \Model\User();
        $user = $userModel->getUser();

        $formulaireAAfficher = true;
        
        if(
            !empty($_POST['gateauId']) 
        && !empty($_POST['name']) 
        && !empty($_POST['description']) 
        && ctype_digit($_POST['gateauId'])
        ){
            $formulaireAAfficher = false;
        }
        





        if($formulaireAAfficher){


                    $modeEdition = false;
                    $gateau_id = null;
                    $recette_id = null;

                    if(!empty($_POST['gateauId']) && ctype_digit($_POST['gateauId'])){

                        $gateau_id = $_POST['gateauId'];

                    }

                    if(!empty($_POST['recetteId']) && ctype_digit($_POST['recetteId'])){

                        $recette_id = $_POST['recetteId'];
                        $modeEdition = true;

                    }
                    

                    if($modeEdition){

                        $recette = $this->model->find($recette_id, $this->modelName);
                  
                        $titreDeLaPage = "Editer la recette";

                        \Rendering::render('recettes/create', compact('user','modeEdition','recette','titreDeLaPage'));


                    }else{  
                        
                    $titreDeLaPage = "Nouvelle recette";

                    \Rendering::render('recettes/create', compact('user','modeEdition','gateau_id','titreDeLaPage'));

                    }

                  
        }else{

            
            // on est dans le cas ou on va créer la novuelle recette

            $gateau_id =  $_POST['gateauId'];
            $name = $_POST['name'] ;
            $description = $_POST['description'];

            $name = htmlspecialchars($name);
            $description = htmlspecialchars($description);

            $this->model->insert($name, $description, $gateau_id, $user->id);
 
            \Http::redirect("index.php?controller=gateau&task=show&id=$gateau_id");

        }


}



    /**
     * modifie une recette existante liée à un gateau
     * 
     * 
     */
public function update()
    {
        $recette_id =null;
        $name = null;
        $description = null;

        if( !empty($_POST['recetteId']) 
        && ctype_digit($_POST['recetteId']) 
        && !empty($_POST['name']) 
        && !empty($_POST['description'])
        ){

            $recette_id =$_POST['recetteId'];
            $name = $_POST['name'];
            $description = $_POST['description'];
               
        }

        if( !$recette_id || !$name || !$description  ){
                die("inexistante probleme");

        }

                $recette = $this->model->find($recette_id, $this->modelName);
                $gateau_id = $recette->gateau_id;

             $this->model->edit($recette_id, $name, $description);

            \Http::redirect("index.php?controller=gateau&task=show&id=$gateau_id");




}




    }

   



?>