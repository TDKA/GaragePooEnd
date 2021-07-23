<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?php echo $titlePage ?></title>
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=gateau&task=index">Gateaux</a>
                    </li>
                <!-- Connect -->
                 <?php if(!$user) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=user&task=login">Connexion</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=user&task=register">S'incrire</a>
                        </li>   
                <?php } ?>

                <!-- Deconnect -->
                 <?php if($user) { ?>
                 
                        <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=user&task=logout">Deconnexion</a>
                        </li>   
                <?php } ?>
                  
                </ul>
                </div>
            </div>
        </nav>
        <div class="container">

            <?php echo $contentOfThePage ?>

            
        <h2>FOOTER</h2>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>