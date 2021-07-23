
<?php  if($modeEdition) { ?>


    <form action="index.php?controller=recette&task=update" method="POST" class="row col-md-6">
    
        <h3>Edit cette recette</h3>

         <input type="hidden" name="recetteId" value="<?php echo $recette->id?>">

        <div class="form-group">
            <textarea  class="form-control" name="name" id="" cols="30" rows="2" ><?php echo $recette->name ?></textarea>
        </div>
    
        <div class="form-group mt-3">
            <textarea  class="form-control" name="description" id="" cols="30" rows="2" ><?php echo $recette->description?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success mt-2">Enregistrer les modification </button>
        </div>  
    
</form>

<?php }else { ?>

 <form action="index.php?controller=recette&task=create" method="POST" class="row col-md-6">
    
        <h3>Ajouter une recette</h3>

        <input type="hidden" name="gateauId" value="<?php echo $gateau_id?>">

        <div class="form-group">
            <textarea  class="form-control" name="name" id="" cols="30" rows="2" placeholder="Name"></textarea>
        </div>
    
        <div class="form-group mt-3">
            <textarea  class="form-control" name="description" id="" cols="30" rows="2" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success mt-2">Ajouter </button>
        </div>  
    
</form>

<?php } ?>
