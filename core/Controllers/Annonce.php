<?php 
namespace Controllers;





class Annonce extends Controller{ 


    protected $modelName= \Model\Annonce::class;

    /**
     * Create new annonce 
     * 
     *  */ 
 public function create() {
    
    $garage_id = null;
    $name = null;
    $price = null;

    if(!empty($_POST['garageId']) && ctype_digit($_POST['garageId']) ){
        $garage_id = $_POST['garageId'];
    }

    if(!empty($_POST['name']) && !empty($_POST['price']) ){
        $name = htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);
    }

    if( !$garage_id || !$name || !$price ){
        die("incorrectly completed form");
    }


    // Find garage by id
    $modelGarage = new \Model\Garage();
    $garage = $modelGarage->find($garage_id); ///// 

    if(!$garage){

        die("This garage do not exist!");

     }

    //insert new Annonce

  $this->model->insert($name, $price, $garage_id); //////

    //Redirect 
  \Http::redirect("index.php?controller=garage&task=show&id=".$garage_id);

}

    /**
     * 
     * Delete annonce
     * 
     */
public function suppr() {

            if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

                $annonce_id = $_GET['id'];
        
            }

            if(!$annonce_id){

                die("Enter valid id in the url");
            }
                
            //find annonce by id
        
            $annonce = $this->model->find($annonce_id); 
            
            //if don't exist
            if(!$annonce){
                    die("this annonce dont exist");
            }

            // $garage_id = $annonce['garage_id'];
                
            //suppr annonce
            $this->model->delete($annonce_id); //////////

           \Http::redirect('index.php?controller=garage&task=show&id='.$annonce['garage_id']);

                
}

}



/// 1. Watch POST

// 2. Check the three data transmitted by POST

///3.  make a request to verify  if the garage exist

//4. if the garage is non-existent => die();

//NEXT ->

//5. INSERT new annonce (requestSQL)

//6. Redirection to the garage page
?>


