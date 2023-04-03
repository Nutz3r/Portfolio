<?php 
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

    // s'il vient de mon form ou non
    if(isset($_POST['nom']))
    {
        // vérif du contenu du formulaire et gestion error
        // init d'une variable $err à 0 
        $err = 0;
        if(empty($_POST['nom']))
        {
            $err = 1;
        }else{
            $nom = htmlspecialchars($_POST['nom']);
        }
        //vérif si err sinon traitement
        if($err==0){
            require "../connexion.php";
            $insert = $bdd->prepare("INSERT INTO categories(nom) VALUES(?)");
            $insert->execute([$nom]);
            $insert->closeCursor();
            header("LOCATION:categories.php?add=success");
        }else{
            header("LOCATION:addCategorie.php?error=".$err);
        }

    }else{
        header("LOCATION:categories.php");
    }

?>