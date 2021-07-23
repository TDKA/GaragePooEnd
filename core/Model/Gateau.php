<?php

namespace Model;

class Gateau extends Model {

    protected $table = "gateaux";

    public $id;
    public $name;
    public $base;
    public $user_id;

/**
 * 
 * Get all "MAKES" per Garage(id)
 * 
 */
public function getMakes() {
    
    $modelMake = new \Model\Make;
    $nbMakes =  $modelMake->findAllByGateau($this->id);

    return $nbMakes;
}


    /**
     * Insert NEW gateaux
     * @param string $name
     * @param string $base
     * 
     * @return void
     */
public function insert(string $name, string $base, int $user_id): void{


        $reqAddGateau = $this->pdo->prepare("INSERT INTO gateaux (name, base , user_id) 
                                        VALUES (:name, :base, :user_id)");

        $reqAddGateau->execute([
                                'name' => $name,
                                'base' => $base,
                                'user_id' => $user_id
                            ]);

}

    /**
     * 
     * Edit CE gateau
     * 
     * @param string $name
     * @param string $base
     * @param int $id
     * 
     * @return void
     */
public function update(string $name, string $base, int $id) :void {

    $reqUpdate = $this->pdo->prepare("UPDATE gateaux SET name=:name,base = :base WHERE id = :id");

        $reqUpdate->execute([

            'name' => $name,
            'base' => $base,
            'id' => $id
        ]);
        
}

/**
 * 
 * Find the author of the gateau
 * 
 * 
 */
public function findAuthor() {
    
    //return Object of user so i can use findAuthor()->username / email / etc in the template
    
    return  $this->find($this->user_id, \Model\User::class, 'users');

}


}






?>