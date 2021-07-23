
<a href="index.php?controller=gateau&task=index" class="btn btn-primary">Retour à l'accueil de gateaux </a>

<h2><?php echo $gateau->name ?></h2>
<h2><?php echo $gateau->base ?></h2>



   <div class="card" style="width: 18rem;">
        
        <div class="card-body">
            <h5 class="card-title"><?php echo $gateau->name ?></h5>
            <p class="card-text"><?php echo $gateau->base ?></p>

            <h3>Author:  <?php echo $gateau->findAuthor()->username ;?></h3>
            <?php if($user) { ?>
            <?php if ( $user->isAuthor($gateau)) { ?>
       
                    <!-- Btn navigate to form edition of CAKE -->
                <form action="index.php?controller=gateau&task=create" method="POST" >
                    <button type="submit" name="id" value="<?php echo $gateau->id ?>" class="btn btn-warning">Modifier</button>
                </form>

                    <!-- Btn delete Cake -->
                <a href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau->id?>" class="btn btn-danger">Supprimer </a>

         




                       <!-- Btn navigate to  the form creation of a receipt  -->
                <form action="index.php?controller=recette&task=create" method="POST">
                    <button type="submit" name="gateauId" value="<?php echo $gateau->id ?>" class="btn btn-success">Ajouter une recette</button>
                </form>
            
            <?php } ?>

                <!-- Btn show makes -->
                <a href="#"  class="btn btn-primary">  Makes &#8470; <?php echo $gateau->getMakes();?> </a>

                <!-- Btn i did/not this receipt -->
                
                      <!-- Btn i did this receipt -->
                    <?php if($user->hasMade($gateau) ) { ?>
                     <form action="index.php?controller=make&task=add" method="POST" class="form">
                     
                     <input type="hidden" name="userId" value = "<?php echo $user->id ?>">

                        <button type="submit" name="gateauId" value="<?php echo $gateau->id ?>" class="btn btn-primary"> <i class="far fa-thumbs-up"></i> J'ai fait ce gateau</button>
                    </form>

                    <?php } else { ?>
                     <form action="index.php?controller=make&task=add" method="POST" class="form">
                     
                     <input type="hidden" name="userId" value = "<?php echo $user->id ?>">

                        <button type="submit" name="gateauId" value="<?php echo $gateau->id ?>" class="btn btn-danger"> <i class="far fa-thumbs-down"></i> J'ai fait pas ce gateau</button>
                    </form>
                    <?php } ?>

            <?php } ?>

             
           
        </div>
    </div>



    <h1>Recettes pour ce gateau:</h1>
    <?php foreach($recettes as $recette) { ?>



        <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title"><?php echo $recette->name ?></h5>
                <p class="card-text"><?php echo $recette->description?></p>

                <!-- find who is the Author of this recette -->
                <h3>Author : <?php echo $recette->findAuthor()->username ?></h3>

                <!-- If is author of this recette show this buttons -->
                <?php if($user) { ?>

                <?php if( $user->isAuthor($recette)) { ?>

                    <form action="index.php?controller=recette&task=suppr&id" method="POST">
                        <button type="submit" name ="id" class="btn btn-danger" value="<?php echo $recette->id ?>">Delete</button>
                    </form>

                        
                        <!-- Btn navigate to form edition of Receipt -->
                    <form action="index.php?controller=recette&task=create" method="POST" class="form">
                        <button type="submit" name="recetteId" value="<?php echo $recette->id ?>" class="btn btn-warning">Modifier</button>
                    </form>

                <?php } ?>
                
                        <!-- Btn show makes -->
                    <h5 href="#"  class="btn btn-primary">  Makes &#8470; <?php echo $recette->getMakes()?> </h5>
                    
                       <!-- Btn i did this receipt -->
                    <?php if($user->hasMade($recette) ) { ?>
                     <form action="index.php?controller=make&task=add" method="POST" class="form">
                     
                     <input type="hidden" name="userId" value = "<?php echo $user->id ?>">

                        <button type="submit" name="recetteId" value="<?php echo $recette->id ?>" class="btn btn-primary"> <i class="far fa-thumbs-up"></i> J'ai fait cette recette</button>
                    </form>

                    <?php } else { ?>
                     <form action="index.php?controller=make&task=add" method="POST" class="form">
                     
                     <input type="hidden" name="userId" value = "<?php echo $user->id ?>">

                        <button type="submit" name="recetteId" value="<?php echo $recette->id ?>" class="btn btn-danger"> <i class="far fa-thumbs-down"></i> J'ai fait pas cette recette</button>
                    </form>

                    <?php } ?>
                    
                <?php } ?>

            </div>
        </div>

    <?php } ?>

    <?php if(empty($recette)) { 

        echo "<h2> PAS DES Recette pour ce gateau ICI!";
    } ?>

  