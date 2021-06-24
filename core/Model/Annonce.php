<?php 

namespace Model;



class Annonce extends Model{

protected $table = 'annonces';

/**
 * find all annonces from a garage and return array or boolean 
 * 
 * @param int $garage_id
 * @return array|bool
 */
public function findAllByGarage(int $garage_id) {

    $requestAnnonces = $this-> pdo-> prepare("SELECT * FROM annonces WHERE garage_id = :garage_id");

    $requestAnnonces->execute(['garage_id' => $garage_id]);

    $annonces = $requestAnnonces->fetchAll();

    return $annonces;

}



/**
 * Insert new annonce
 * @param string $name
 * @param int $price
 * @param int $garage_id
 * @return void
 */
 public function insert(string $name, int $price, int $garage_id): void{


    $reqAddAnnonce = $this->pdo->prepare("INSERT INTO annonces (name, price, garage_id) 
                                    VALUES (:name, :price, :garage_id)");

    $reqAddAnnonce->execute([
                            'name' => $name,
                            'price' => $price,
                            'garage_id' => $garage_id

                        ]);

}

}

?>