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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Gallery - Antoine Lespagnard</title>
</head>
<body class="galleryBody">

    <div class="back">
        <a class="goBack" href="index.php#myWork"> < Back to site</a>
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
            echo "<img class='format' src='images/portfolio/".$don['gimage']."' alt='image de ".$don['gnom']."' data-image='images/portfolio/".$don['gimage']."'>";
        }
        $req->closeCursor();
    ?>



    </div>

    
</div>

<div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <img id="lightbox-image" class="lightbox-content" src="" alt="Lightbox Image">
</div>


</body>


<!-- ******************************************************** -->

<footer>


<div id="footer1">
    <div class="menufooter" id="menufooter1">  
        <h3>Menu</h3>
        <ul>
            <li><a href="index.php#whoami">Who Am I?</a></li>
            <li><a href="index.php#seemywork">My Work</a></li>
            <li><a href="index.php#myskills">Skills</a></li>
            <li><a href="index.php#contact">Contact Me</a></li>
        </ul>
    </div>
    <div class="menufooter" id="menufooter2">  
        <h3>Categories</h3>
        <ul>
            <li><a href="gallery.php?cat=Photographie">Photography</a></li>
            <li><a href="gallery.php?cat=Illustrator">Illustration</a></li>
            <li><a href="gallery.php?cat=PremierPro">Video</a></li>
            <li><a href="gallery.php?cat=Web">Web</a></li>
            <li><a href="gallery.php?cat=InDesign">Layout</a></li>
            <li><a href="gallery.php?cat=Blender">3D</a></li>
            <li><a href="gallery.php?cat=Autres">Others</a></li>
        </ul>
    </div>
    <div class="menufooter" id="menufooter3">  
        <h3>Contact</h3>
        <ul>
            <li>antoinelespagnard@gmail.com</li>
            <li><a href="https://www.instagram.com/nutzer_photography/" target="blank">Instagram: nutzer_photography</a></li>
            <li><a href="legal.php">Legal mentions</a ></li>
        </ul>
    </div>
</div>


<div id="footer2">
    <div>
        &copy;Antoine Lespagnard 2023
    </div>
</div>



</footer> 

    
</body>
</html>
<script>
    $(document).ready(function() {
        $(".format").click(function() {
            var imagePath = $(this).attr("src");
            $("#lightbox-image").attr("src", imagePath);
            $("#lightbox").fadeIn();
        });

        $(".close").click(function() {
            $("#lightbox").fadeOut();
        });
    });
</script>

</html>