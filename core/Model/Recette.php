<?php

namespace Model;
use PDO;

class Recette extends Model {

protected $table = "recettes";

public $id;
public $name;
public $description;
public $gateau_id;
public $user_id;



/**
 * 
 * Get all "MAKES" per Recette(id)
 * 
 */
public function getMakes() {
    
    $modelMake = new \Model\Make;
    $nbMakes =  $modelMake->findAllByRecette($this->id);

    return $nbMakes;

}

    /**
     * 
     *  modifie une recette liée a un gateau dans la base de données
     * @param int $recette_id
     * @param string $name
     * @param string $description
     * @return void
     * 
     */
public function edit($recette_id, $name, $description):void
    {

            $sql = $this->pdo->prepare("UPDATE recettes 
            SET name = :name, description = :description 
            WHERE id = :id");

            $sql->execute([
                    'name' => $name,
                    'description' => $description,
                    'id' => $recette_id
            ]);

}

/**
 * find ALL Recettes from a gateau and return array or boolean 
 * 
 * @param int $gateau_id
 * @param string $className
 * @return array|bool
 */
public function findAllByGateau(int $gateau_id) {

    $reqReccete = $this-> pdo-> prepare("SELECT * FROM recettes WHERE gateau_id = :gateau_id");

    $reqReccete->execute(['gateau_id' => $gateau_id]);

    $recettes = $reqReccete->fetchAll( PDO::FETCH_CLASS, \Model\Recette::class );

    return $recettes;

}


/**
* Insert NEW RECETTE
* @param string $name
* @param string $description
* @param int $gateau_id 

* @return void
*/

public function insert(string $name, string $description, int $gateau_id,  int $user_id) :void {

    $reqAddRecette = $this->pdo->prepare("INSERT INTO recettes(name, description, gateau_id, user_id) VALUES(:name, :description, :gateau_id, :user_id)" );

    $reqAddRecette->execute([

        'name' => $name,
        'description' => $description,
        'gateau_id' => $gateau_id,
        'user_id' => $user_id

    ]);



}

/**
 * 
 * Find the author of the recettte
 * 
 * 
 */
public function findAuthor() {
    
    //return Object of user so i can use findAuthor()->username / email / etc in the template
    
    return  $this->find($this->user_id, \Model\User::class, 'users');

}


}


?>