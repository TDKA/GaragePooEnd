

  <a href="index.php?controller=gateau&task=create&id=" class="btn btn-primary">Ajouter gateau </a>

<?php foreach ($myGateaux as $gateau) { ?>

        <div class="card" style="width: 18rem;">
        
        <div class="card-body">
            <h5 class="card-title"><?php echo $gateau['name'] ?></h5>
            <p class="card-text"><?php echo $gateau['base'] ?></p>
       
            <a href="index.php?controller=gateau&task=show&id=<?php echo $gateau['id']?>"  class="btn btn-primary">Voir plus </a>
           
        </div>
        </div>

<?php } ?>

