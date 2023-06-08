<?php 
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

     //vérifier la prés de id
     if(isset($_GET['id']))
     {
         $id = htmlspecialchars($_GET['id']);
     }else{
         header("LOCATION:products.php");
     }
 
     // vérifier si l'id est dans la bdd
     require "../connexion.php";
     $req = $bdd->prepare("SELECT * FROM skills WHERE id=?");
     $req->execute([$id]);
     if(!$don = $req->fetch())
     {
         $req->closeCursor();
         header("LOCATION:skills.php");
     }
     $req->closeCursor();

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
            if(empty($_FILES['image']['tmp_name']))
            {
                require "../connexion.php";
                $update = $bdd->prepare("UPDATE skills SET nom=? WHERE id=?");
                $update->execute([$nom,$id]);
                $update->closeCursor();
                header("LOCATION:skills.php?update=".$id);

            }else{

                $dossier = "../images/skills/"; // ../images/monfichier.jpg
                $fichier = basename($_FILES['image']['name']);
                $taille_maxi = 2000000;
                $taille = filesize($_FILES['image']['tmp_name']);
                $extensions = ['.png','.jpg','.jpeg'];
                $extension = strrchr($_FILES['image']['name'],'.');

                if(!in_array($extension, $extensions))
                {
                    $erreur = 1;
                }
                
                if($taille>$taille_maxi){
                    $erreur = 2;
                }


                if(!isset($erreur))
                {
                    // traitement
                    $fichier = strtr($fichier, 
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                    $fichier = preg_replace('/([^.a-z0-9]+)/i','-',$fichier); 
                    $fichiercptl = rand().$fichier; 

                    if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$fichiercptl))
                    {

                        unlink("../images/skills/".$don['fichier']);
                        require "../connexion.php";
                        $update = $bdd->prepare("UPDATE skills SET nom=?, fichier=? WHERE id=?");
                        $update->execute([$nom,$fichiercptl,$id]);
                        $update->closeCursor();
                        header("LOCATION:skills.php?update=".$id);


                    
        

                    }else{
                        header("LOCATION:updateskill.php?id=".$id."&errorimg=3");

                    }             
                }else{
                    header("LOCATION:updateskill.php?id=".$id."&errorimg=".$erreur);
                }



            }



        }else{
            header("LOCATION:updateskill.php?id=".$id."&error=".$err);
        }

    }else{
        header("LOCATION:skills.php");
    }

?>