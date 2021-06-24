<?php 

namespace Controllers;



class Garage extends Controller {

    protected $modelName = \Model\Garage::class;
    
    /**
     * 
     * Show home(page) of site
     */
    public function index() {

        $garages = $this->model->findAll();

        $titlePage = "Garages";

         \Rendering::render("garages/garages",
                compact('garages', 'titlePage')
            );

    }

    /**
     * Show ONE GARAGE with all annonces for this garage 
     * 
     */
    public function show() {

        $garage_id= null;

        // ctype_digit / empty methods
        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

            $garage_id = $_GET['id'];
        }

        if(!$garage_id) {
            die("Add id in the URL"); 
        }

        /// ******* Find garage ********* ///
     
        $garage = $this->model->find($garage_id);


        ///// ****** Find Annonces   ***** ////
        
        $modelAnnonce = new \Model\Annonce();
        $annonces = $modelAnnonce->findAllByGarage($garage_id); 

        $titlePage = $garage['name'];
           
        \Rendering::render("garages/garage",

        compact('garage', 'annonces', 'titlePage')

        );

    }

    /**
     * 
     * Delete ONE GARAGE
     * 
     */
    public function suppr() {

        if(isset($_GET['id'])) {

                if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

                $garage_id = $_GET['id'];

                if(!$garage_id) {
                
                    die("il faut entrer un id valide en paramtre dans l'url");
                    //Check if the garage exist
                    $garage = $this->model->find($garage_id);

                if(!$garage) {

                            die("Désolé mais ce garage n'existe pas");

                }          
                    //Delete Garage

                        $this->model->delete($garage_id);

                        \Http::redirect('index.php');
                }

            }
        }

    }

}


?>