
<h1><?php if($user){ echo 'Hello'. ' '. $user->username; } ;?></h1>


  <?php if($user) { ?>
  <a href="index.php?controller=gateau&task=create&id=" class="btn btn-primary">Ajouter gateau </a>
  <?php }?>

<?php foreach ($myGateaux as $gateau) { ?>

        <div class="card" style="width: 18rem;">
        
        <div class="card-body">
            <h5 class="card-title"><?php echo $gateau->name ?></h5>
            <p class="card-text"><?php echo $gateau->base ?></p>
           
            
            <h3>Author:  <?php echo $gateau->findAuthor()->username ;?></h3>
       
            <a href="index.php?controller=gateau&task=show&id=<?php echo $gateau->id?>"  class="btn btn-primary">Voir plus </a>
              
               
              <a href="#"  class="btn btn-success"> Makes <i class="far fa-thumbs-up"></i><?php echo $gateau->getMakes() ?> </a>

                <?php if($user) { ?>
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

<?php } ?>

