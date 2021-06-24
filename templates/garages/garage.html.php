
<a href="index.php" class="btn btn-primary">Retour aux garages</a>
<h1>Garage: <?php echo $garage['name'] ?> </h1>

<ul>

    <li>Addresse:  <?php echo $garage['addresse'] ?></li>
    <li>Description:  <?php echo $garage['description'] ?></li>

</ul>

    <form action="index.php?controller=annonce&task=create" method="POST" class="row col-md-6">
    
        <h3>Ajouter une annonce</h3>

        <input type="hidden" name="garageId" value="<?php echo $garage['id'] ?>">

        <div class="form-group">
            <textarea  class="form-control" name="name" id="" cols="30" rows="2" placeholder="Name"></textarea>
        </div>
    
        <div class="form-group mt-3">
            <textarea  class="form-control" name="price" id="" cols="30" rows="2" placeholder="Price"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success mt-2">Ajouter </button>
        </div>
    
    
    </form>


    <?php if(empty($annonces)) { 

        echo "<h2> No annonces pour ce garage !";
    } ?>

 
        <?php foreach ($annonces as $annonce) { ?>


            <div class="card mt-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Name: <?php echo $annonce['name'] ?></h5>
                    <h7 class="card-title">Annonce:  <?php echo $annonce['id'] ?></h7>
                    <p class="card-text">Price: <?php echo $annonce['price'] ?> €</p>
                    <a href="index.php?controller=annonce&task=suppr&id=<?php echo $annonce['id'] ?>" class="btn btn-danger">Delete annonce</a>
                </div>

        <?php } ?>
    
