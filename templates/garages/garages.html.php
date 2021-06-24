
<?php foreach($garages as $garage) { ?>
       
        <div class="row">
            <p><strong>

            <?php echo $garage["name"] ;?>
            <br>
            <?php echo $garage["addresse"] ;?>
            <br>
            <?php echo $garage["description"] ;?>
       
            </strong></p>
            
            <a href="index.php?controller=garage&task=show&id=<?php echo $garage['id']?>" class="btn btn-primary">Voir ce garage</a>
            
            <a href="index.php?controller=garage&task=suppr&id=<?php echo $garage['id']?>" class="btn btn-danger">Delete garage</a>
            <hr>
        </div>

    <?php } ?>