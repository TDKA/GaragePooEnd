<?php

namespace Model;

class Recette extends Model {

protected $table = "recettes";



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
 * find ALL GATEAU from a gateau and return array or boolean 
 * 
 * @param int $gateau_id
 * @return array|bool
 */
public function findAllByGateau(int $gateau_id) {

    $reqReccete = $this-> pdo-> prepare("SELECT * FROM recettes WHERE gateau_id = :gateau_id");

    $reqReccete->execute(['gateau_id' => $gateau_id]);

    $recettes = $reqReccete->fetchAll();

    return $recettes;

}


/**
* Insert NEW RECETTE
* @param string $name
* @param string $description
* @param int $gateau_id 

* @return void
*/

public function insert(string $name, string $description, int $gateau_id) :void {

    $reqAddRecette = $this->pdo->prepare("INSERT INTO recettes(name, description, gateau_id) VALUES(:name, :description, :gateau_id)" );

    $reqAddRecette->execute([

        'name' => $name,
        'description' => $description,
        'gateau_id' => $gateau_id

    ]);



}


}


?>