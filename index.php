<?php
    require "connexion.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js" ></script>
    <title>Antoine Lespagnard - Portfolio</title>
</head>
<body> 


<!-- ******************************************************** -->
    <nav>
        <a class="btn_name" href="#profil">
                <div id="button">
                    <div class="button-hover">
                        <div class="button-triangle"></div>
                        <div class="button-body"></div>
                    </div>
                </div>
            <h1 id="titre1">Profil</h1>
        </a>
            
        <a class="btn_name" href="#competences">
                <div id="button">
                    <div class="button-hover">
                        <div class="button-triangle"></div>
                        <div class="button-body"></div>
                    </div>
                </div>
            <h1 id="titre1">Skills</h1>            
        </a>

        <a class="btn_name" href="#myWork">
                <div id="button">
                    <div class="button-hover">
                        <div class="button-triangle"></div>
                        <div class="button-body"></div>
                    </div>
                </div>
            <h1 id="titre1">My•Work</h1>  
        </a>

        <a class="btn_name" href="#contact">
                <div id="button">
                    <div class="button-hover">
                        <div class="button-triangle"></div>
                        <div class="button-body"></div>
                    </div>
                </div>
            <h1 id="titre1">Contact</h1>   
        </a>



        <a class="back-top" href="#accueil"><img src="images/icons/back-to-top.svg" alt=""></a>

    </nav>



<!-- ******************************************************** -->
    <div id="accueil">
        
        <div class="discover">

            <h1 id="hello">Looking for...</h1>

            <div class="choice">
                <a class="bouton-accueil" href="#contact">Contact me</a>
                <a class="bouton-accueil" href="#profil">Who am I?</a>
            </div> 
            
        </div>



    <div class="section">
        <div class="image-container">
            <div class="moi" style="background-image: url(images/scroll/1.png);"></div>
        </div>
    </div>
    
    
    <div class="section">
        <div class="image-container">
            <div class="moi" style="background-image: url(images/scroll/2.png);"></div>
        </div>
    </div>
    
    <div class="section">
        <div class="image-container">
            <div class="moi" style="background-image: url(images/scroll/3.png);"></div>
        </div>
    </div>
    
    <div class="section">
        <div class="image-container">
            <div class="moi" style="background-image: url(images/scroll/4.png);"></div>
        </div>
    </div>
    
    <div class="section">
        <div class="image-container">
            <div class="moi" style="background-image: url(images/scroll/5.png);"></div>
        </div>
    </div>
    
    <div class="section last">
        <div class="image-container">
            <div class="moi" style="background-image: url(images/scroll/6.png);"></div>
        </div>
    </div>
    
    
</div>   

<!-- ******************************************************** -->
<div class="tempo"></div>

    <div id="profil"> <!-- PRESENTATION ET SKILLS -->
        <div class="left-content">
            <div class="contenu"></div>
            <div class="infos texte">
                <h1>Lorem Ipsum</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, repudiandae commodi obcaecati quas veritatis cum. Commodi nam aliquam neque itaque obcaecati magnam nesciunt distinctio reiciendis corporis, voluptatum cumque, ipsam ipsa earum molestiae repellat enim perferendis delectus atque numquam laudantium nisi asperiores voluptatibus iste!</p>
            </div>
        </div>

        <div class="right-content">
            <div class="contenu"></div>
            <div class="infos texte-droite">
                <h1>Lorem Ipsum</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, repudiandae commodi obcaecati quas veritatis cum. Commodi nam aliquam neque itaque obcaecati magnam nesciunt distinctio reiciendis corporis, voluptatum cumque, ipsam ipsa earum molestiae repellat enim perferendis delectus atque numquam laudantium nisi asperiores voluptatibus iste! Temporibus, in? </p>
            </div>
        </div>
    </div>

    
    
    

<!-- ******************************************************** -->
<div class="tempo">
    <h2>My Skills</h2>
</div>
<div id="competences">

    <div class="skillsWrapper">
        <?php

            $req = $bdd->prepare("SELECT * FROM skills ORDER BY id DESC");
            $req->execute();
            while($don = $req->fetch())
            {
                echo "<img class='skillsIcons' src='images/skills/".$don['fichier']."' alt='image de ".$don['nom']."'>";
                }
            $req->closeCursor();
        ?>
    </div>
</div>

<!-- ******************************************************** -->

<div class="tempo myWork">
<h2>My work</h2>
</div>

    <div id="myWork">
        <div class="categorie gauche">
            <div class="photo"></div>
            <div class="photo"></div>
            <div class="photo"></div>
            <div class="photo"></div>
            <div class="photo"></div>
            <h3 class="cat"><a href="gallery.php?cat=Photographie">Photography</a></h3>
        </div>
        <div class="categorie droite">
            <div class="photo"></div>
            <div class="photo"></div>
            <div class="photo"></div>
            <div class="photo"></div>
            <div class="photo"></div>
            <h3 class="cat"><a href="gallery.php?cat=Illustrator">Illustration</a></h3>
        </div>
        <div class="categorie gauche">
            <div class="photo"></div>
            <div class="photo"></div>
            <div class="photo"></div>
            <div class="photo"></div>
            <div class="photo"></div>
            <h3 class="cat"><a href="gallery.php?cat=Vidéo">Video</a></h3>
    
        </div>


    </div>

<!-- ******************************************************** -->
<div class="tempo">
<h2>Contact Me</h2>

</div>

    <div id="contact">
        <div class="containercontact">
            <h1 class="contact">Formulaire de contact</h1>
                <form action="traitement.php" method="POST">
                    <?php
                        if(isset($_GET['add']))
                        {
                            echo "<div class='success'>Votre message a bien été envoyé</div>";
                        }
                    ?>
                <input type="" placeholder="your Name" id="nom" name="nom" required>
                <input type="email" name="email" id="email" placeholder="E-mail" required>
                <textarea id="message" cols="30" rows="10" placeholder="Your Message" name="message" required></textarea>
                <input type="submit" value="submit" class="btnwsh">
                    <?php
                        if(isset($_GET['error']))
                        {
                            echo "<div class='error'>Une erreur est survenue</div>";
                        }
                    ?>
                </form>
        </div>
    </div>

<!-- ******************************************************** -->


    
</body>
</html>