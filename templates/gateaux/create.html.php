
<?php if (!$gateau) {?>

<form action="index.php?controller=gateau&task=create" method="POST" class="row col-md-6">
    
            <h3>Ajouter un gateau</h3>

            <div class="form-group">
                <textarea  class="form-control" name="name" id="" cols="30" rows="2" placeholder="Name"></textarea>
            </div>
        
            <div class="form-group mt-3">
                <textarea  class="form-control" name="base" id="" cols="30" rows="2" placeholder="Base"></textarea>
            </div>
            <div class="form-group">
                <button type= "submit" class="btn btn-success mt-2">Ajouter </button>
            </div>
    
</form>

<?php }else{ ?>


<form action="index.php?controller=gateau&task=edit" method="POST" class="row col-md-6">

<input type="hidden" name="id" value="<?php echo $gateau['id'] ?>">
    
            <h3>Modifier le gateau</h3>

            <div class="form-group">
                <textarea  class="form-control" name="name" id="" cols="30" rows="2"><?php echo $gateau['name'] ?></textarea>
            </div>
        
            <div class="form-group mt-3">
                <textarea  class="form-control" name="base" id="" cols="30" rows="2" > <?php echo $gateau['base'] ?></textarea>
            </div>
            <div class="form-group">
                <button type= "submit" class="btn btn-warning mt-2">Enregistrer les modifications </button>
            </div>
    
</form>

    <?php }?>
