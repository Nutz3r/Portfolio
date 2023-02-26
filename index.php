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
            <h1 id="titre1">Compétences</h1>            
        </a>

        <a class="btn_name" href="#galerie">
                <div id="button">
                    <div class="button-hover">
                        <div class="button-triangle"></div>
                        <div class="button-body"></div>
                    </div>
                </div>
            <h1 id="titre1">Galerie</h1>  
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
  </nav>

<!-- ******************************************************** -->

    <div id="accueil">

        <div class="discover">

            <h1 id="hello">Lorem Ipsum</h1>

            <div class="choice">
                <a class="bouton-accueil" href="#contact">Me contacter</a>
                <a class="bouton-accueil" href="#profil">Qui suis-je?</a>
            </div> 
            
        </div>

        <div id="arrow">
            <a href="#profil"><img src="images/icons/arrow-down.svg" alt="arrow-down"></a>
        </div>
    </div>


<!-- ******************************************************** -->


    <div id="profil">
        <div class="left-content">
            <div class="contenu"></div>
            <div class="infos texte">
                <h1>Lorem Ipsum</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, repudiandae commodi obcaecati quas veritatis cum. Commodi nam aliquam neque itaque obcaecati magnam nesciunt distinctio reiciendis corporis, voluptatum cumque, ipsam ipsa earum molestiae repellat enim perferendis delectus atque numquam laudantium nisi asperiores voluptatibus iste! Temporibus, in? Architecto obcaecati volupetatum iusto deserunt in nisi omnis quae? Odit fugiat tempora a illo unde, nostrum maiores iusto. Praesentium, atque consequuntur voluptate veniam nesciunt, illo quis ut rem, id ducimus non. Itaque quas veniam maxime, corrupti praesentium libero doloribus enim placeat voluptatum labore, nam quia reprehenderit nobis eos voluptates assumenda sit esse, cum nesciunt voluptatem!</p>
            </div>

            
        </div>

        <div class="right-content">
            <div class="contenu"></div>
            <div class="infos texte-droite">
                <h1>Lorem Ipsum</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, repudiandae commodi obcaecati quas veritatis cum. Commodi nam aliquam neque itaque obcaecati magnam nesciunt distinctio reiciendis corporis, voluptatum cumque, ipsam ipsa earum molestiae repellat enim perferendis delectus atque numquam laudantium nisi asperiores voluptatibus iste! Temporibus, in? Architecto obcaecati voluptatum iusto deserunt in nisi omnis quae? Odit fugiat tempora a illo unde, nostrum maiores iusto. Praesentium, atque consequuntur voluptate veniam nesciunt, illo quis ut rem, id ducimus non. Itaque quas veniam maxime, corrupti praesentium libero doloribus enim placeat voluptatum labore, nam quia reprehenderit nobis eos voluptates assumenda sit esse, cum nesciunt voluptatem!</p>
            </div>
        </div>
        
        <div class="left-content">
            <div class="contenu"></div>
            <div class="infos texte">
                <h1>Lorem Ipsum</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, repudiandae commodi obcaecati quas veritatis cum. Commodi nam aliquam neque itaque obcaecati magnam nesciunt distinctio reiciendis corporis, voluptatum cumque, ipsam ipsa earum molestiae repellat enim perferendis delectus atque numquam laudantium nisi asperiores voluptatibus iste! Temporibus, in? Architecto obcaecati volupetatum iusto deserunt in nisi omnis quae? Odit fugiat tempora a illo unde, nostrum maiores iusto. Praesentium, atque consequuntur voluptate veniam nesciunt, illo quis ut rem, id ducimus non. Itaque quas veniam maxime, corrupti praesentium libero doloribus enim placeat voluptatum labore, nam quia reprehenderit nobis eos voluptates assumenda sit esse, cum nesciunt voluptatem!</p>
            </div>
        </div>
    
    </div>

    
    
    

<!-- ******************************************************** -->

    <div id="competences">
        
    </div>


<!-- ******************************************************** -->

    <div id="galerie">
        
    </div>

<!-- ******************************************************** -->

    <div id="contact">
        
    </div>

<!-- ******************************************************** -->



<script>

    //Accueil

    document.getElementById("arrow").addEventListener("click", function() {
        accueil.classList.add("accueil-clicked");});
        
        var test =  document.getElementsByClassName("bouton-accueil")

        for (let i = 0; i < test.length; i++) {
                test[i].addEventListener("click", function() {
        accueil.classList.add("accueil-clicked");});
            }
            
    </script>

    
</body>
</html>