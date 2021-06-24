<?php

namespace Controllers;

class Gateau extends Controller {

    protected $modelName = \Model\Gateau::class;

    /**
     * 
     * show all the cakes
     * 
     * index() call ALL the items  - "findAll()" from the db
     */

    public function index()  {

        $myGateaux = $this->model->findAll();

        $titlePage = "Gateaux";

        \Rendering::render("gateaux/gateaux",
                compact('myGateaux', 'titlePage')
            );

    }



     /**
     * Show ONE CAKE
     * 
     */
public function show() {

        $gateau_id= null;

        // ctype_digit / empty methods
        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

            $gateau_id = $_GET['id'];
        }

        if(!$gateau_id) {
            die("Add id in the URL"); 
        }

        /// ******* Find gateau ********* ///
        $gateau = $this->model->find($gateau_id);


        ///// ****** Find Reccetes   ***** ///
        $modelRecette = new \Model\Recette();
        $recettes = $modelRecette->findAllByGateau($gateau_id); 


        $titlePage = $gateau['name'];
           
        \Rendering::render("gateaux/gateau",

        compact('gateau','recettes', 'titlePage')

        );

}



     /**
     * 
     * Delete ONE Gateaux
     * 
     */
public function suppr() {

        if(isset($_GET['id'])) {

                if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

                $gateau_id = $_GET['id'];

                if($gateau_id) {
                
                    //Check if the gateu exist
                    $gateau = $this->model->find($gateau_id);

                if(!$gateau) {

                            die("Désolé mais ce gateua n'existe pas");

                }          
                    //Delete Gateux

                        $this->model->delete($gateau_id);

                        \Http::redirect("index.php?controller=gateau&task=index");
                }

            }
        }

}



/**
 * 
 * 
 * Show form "create NEW GATEAU" or  "edit THIS GATEAU"
 * 
 */
 public function create()

 
    {
        $gateauACreer= false;

        $name = null;
        $base = null;

    if(!empty($_POST['name']) && !empty($_POST['base'])){

        $name = htmlspecialchars($_POST['name']);
        $base = htmlspecialchars($_POST['base']);
        $gateauACreer = true;
    }
        if($gateauACreer){

                    $this->model->insert($name, $base);

                     \Http::redirect("index.php?controller=gateau&task=index");

        }else{

            $modeEdition=false;

            if( !empty($_POST['id']) && ctype_digit($_POST['id'])   ){
               
                $gateau_id = $_POST['id'];
                $modeEdition = true;
         
            }


            if(!$modeEdition){
                            $gateau = null;
                            $titreDeLaPage = "nouveau gateau";
                            \Rendering::render('gateaux/create', compact('gateau','titreDeLaPage')); 
            }else{ 
                
                $gateau = $this->model->find($gateau_id);
                $nomGateau = $gateau['name'];


                $titreDeLaPage = "Editer $nomGateau";
                \Rendering::render('gateaux/create', compact('gateau','titreDeLaPage')); 

            }


        }

    }






/**
 * 
 * Edit un gateau
 * 
 */

 public function edit() {

    if(!empty($_POST['name']) && !empty($_POST['base']) && !empty($_POST['id']) && ctype_digit($_POST['id']) ) {

        $gateau_id = $_POST['id'];
        $name = htmlspecialchars($_POST['name']);
        $base = htmlspecialchars($_POST['base']);
    

        $this->model->update($name, $base, $gateau_id);

        \Http::redirect("index.php?controller=gateau&task=show&id=$gateau_id");

    }else {

        die("Sorry, you are not for here ..");
    }


 }


}




?>