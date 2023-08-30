<?php
    require "connexion.php";

    if(isset($_GET['cat']))
    {
        $category = htmlspecialchars($_GET['cat']);
    }else{
        header("LOCATION:index.php");
    }

    $cat = $bdd->prepare("SELECT * FROM categories WHERE nom=?");
    $cat->execute([$category]);
    if(!$donCat = $cat->fetch())
    {
        $cat->closeCursor();
        header("LOCATION:index.php");
    }
    $cat->closeCursor();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gallery - Antoine Lespagnard</title>
</head>
<body class="galleryBody">

    <div class="back">
        <a class="goBack" href="index.php.#myWork"> < Back to site</a>
    </div> 

    <div id="galerie">

    <div class="tempo">
       
    

    <h2>Gallery</h2>
    </div>


    <div class="gallery">
    <?php
       $req = $bdd->prepare("SELECT galerie.image as gimage, galerie.nom as gnom, categories.nom as cnom, galerie.id as gid, categories.id as cid FROM galerie INNER JOIN categories ON galerie.id_categorie = categories.id WHERE galerie.id_categorie=? ORDER BY galerie.id DESC");
        
        $req->execute([$donCat['id']]);
        while($don = $req->fetch())
        {
            echo "<img class='format' src='images/portfolio/".$don['gimage']."' alt='image de ".$don['gnom']."'>";
        }
        $req->closeCursor();
    ?>



    </div>

    
</div>


</body>
</html>