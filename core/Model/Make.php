<?php

    namespace Model;

    class Make extends Model {

        protected $table = "makes";

        public $id;
        public $gateau_id;
        public $recette_id;
        public $user_id;
      

/**
 * 
 * 
 * 
 */
public function findByUser(object $gateauOrRecette, User $user) {

    $req ="SELECT * FROM makes WHERE recette_id = :item_id AND user_id = :user_id";

    if(isset($gateauOrRecette->base) ) {
        $req ="SELECT * FROM makes WHERE gateau_id = :item_id AND user_id =:user_id";
    }

    $request = $this->pdo->prepare($req);
    
    $request->execute([
        ':item_id'=> $gateauOrRecette->id,
        ':user_id'=> $user->id
    ]);

    $make = $request->fetch();

    if($make) {
        return true;
    }else {
        return false;
    }
}

/**
 * Return the number of MAKES for a CAKE(id) and return array or boolean 
 * 
 * @param int $gateau_id
 * 
 * @return int $numberMakes
 * 
 */
public function findAllByGateau( int $gateau_id) {

    $reqMakes = $this-> pdo-> prepare("SELECT * FROM makes WHERE gateau_id = :gateau_id");

    //result of the request
    $reqMakes->execute(['gateau_id' => $gateau_id]);

    //Count the numbers of rows : return INT
    $numberMakes = $reqMakes->rowCount( );

    return $numberMakes;

}

/**
 * find ALL MAKES for a RECETTE and return array or boolean 
 * 
 * @param int $recette_id
 * @return int
 */
public function findAllByRecette(int $recette_id) {

    $reqMakes = $this-> pdo->prepare("SELECT * FROM makes WHERE recette_id = :recette_id");

    $reqMakes->execute(['recette_id' => $recette_id]);
    $numberMakes = $reqMakes->rowCount();


    return $numberMakes;

}

/**
 * 
 * 
 * 
 */
public function insert(string $gateauOrRecette, int $id, int $user_id) :void {

    if($gateauOrRecette == 'recette') {
        $req = $this->pdo->prepare("INSERT INTO makes(recette_id, user_id) VALUES(:id, :user_id)");
    
    }
    
    if($gateauOrRecette == 'gateau') {
        $req = $this->pdo->prepare("INSERT INTO makes(gateau_id, user_id) VALUES(:id, :user_id)");
    }

    $req->execute([
        ':id'=>$id,
        ':user_id'=>$user_id
    ]);

}

// /**
//  * 
//  * 
//  * 
//  */
// public function delete() {

    

// }




}



?>