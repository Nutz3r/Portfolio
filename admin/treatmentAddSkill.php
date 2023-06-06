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
        $nom = $_POST['nom'];

        if(empty($_POST['nom']))
        {
            $err = 1;
        }else{
            $nom = htmlspecialchars($_POST['nom']);
        }
        //vérif si err sinon traitement
        if($err==0){

            $dossier = "../images/skills/"; // ../images/monfichier.jpg
            $fichier = basename($_FILES['image']['name']);
            $taille_maxi = 2000000;
            $taille = filesize($_FILES['image']['tmp_name']);
            $extensions = ['.png', '.jpg', '.jpeg'];
            $extension = strrchr($_FILES['image']['name'], '.');
    
            if (!in_array($extension, $extensions)) {
                $erreur = 1;
            }
    
            if ($taille > $taille_maxi) {
                $erreur = 2;
            }
    
            if (!isset($erreur)) {
                // traitement
                $fichier = strtr(
                    $fichier,
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
                );
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                $fichiercptl = rand() . $fichier;
    
                if (move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichiercptl)) {
    


            require "../connexion.php";
            $insert = $bdd->prepare("INSERT INTO skills(nom,image) VALUES(?,?)");
            $insert->execute([$nom, $fichiercptl]);
            $insert->closeCursor();

            if($extension==".png")
            {
                header("LOCATION:redimpng.php?image=".$fichiercptl);
            }else{
                header("LOCATION:redim.php?image=".$fichiercptl);
            }
        } else {
            header("LOCATION:addSkill.php?errorimg=3");
        }
    } else {
        header("LOCATION:addSkill.php?errorimg=" . $erreur);
    }
} else {
    header("LOCATION:addSkill.php?error=" . $err);
}
} else {
header("LOCATION:skills.php");
}

?>