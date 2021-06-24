<?php

namespace Model;

class Gateau extends Model {

    protected $table = "gateaux";


    
    /**
     * Insert NEW gateaux
     * @param string $name
     * @param string $base
     * 
     * @return void
     */
public function insert(string $name, string $base): void{


        $reqAddGateau = $this->pdo->prepare("INSERT INTO gateaux (name, base) 
                                        VALUES (:name, :base)");

        $reqAddGateau->execute([
                                'name' => $name,
                                'base' => $base
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

}





?>