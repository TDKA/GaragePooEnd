
<a href="index.php?controller=gateau&task=index" class="btn btn-primary">Retour à l'accueil de gateaux </a>

<h2><?php echo $gateau['name'] ?></h2>
<h2><?php echo $gateau['base'] ?></h2>



   <div class="card" style="width: 18rem;">
        
        <div class="card-body">
            <h5 class="card-title"><?php echo $gateau['name'] ?></h5>
            <p class="card-text"><?php echo $gateau['base'] ?></p>
       
            

            <form action="index.php?controller=gateau&task=create" method="POST">
                <button type="submit" name="id" value="<?php echo $gateau['id'] ?>" class="btn btn-warning">Modifier</button>
            </form>


            <a href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau['id']?>" class="btn btn-danger">Supprimer </a>

   

        
            <form action="index.php?controller=recette&task=create" method="POST">
            
                <button type="submit" name="gateauId" value="<?php echo $gateau['id'] ?>" class="btn btn-success">Ajouter une recette</button>

            </form>
             
           
        </div>
    </div>




    <h1>Recettes pour ce gateau:</h1>
    <?php foreach($recettes as $recette) { ?>

        <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title"><?php echo $recette['name'] ?></h5>
                <p class="card-text"><?php echo $recette['description'] ?></p>
        
                <form action="index.php?controller=recette&task=suppr&id" method="POST">
                    <button type="submit" name ="id" class="btn btn-danger" value="<?php echo $recette['id'] ?>">Delete</button>
                </form>


      <form action="index.php?controller=recette&task=create" method="POST" class="form">
                        <button type="submit" name="recetteId" value="<?php echo $recette['id'] ?>" class="btn btn-warning">Modifier</button>
                        </form>
            </div>
        </div>

    <?php } ?>

    <?php if(empty($recette)) { 

        echo "<h2> PAS DES Recette pour ce gateau ICI!";
    } ?>