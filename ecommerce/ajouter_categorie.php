<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  -->

    <title>Document</title>
</head>
<body> 
<?php include "include/nav.php" /* importer le fichier nav.php*/?>
<div class="container py-2"> <!--Pour décaler un peu a droite les labels et les champs de saisie-->
    <h4>Ajouter catégorie</h4>
    <?php 
        if(isset($_POST["ajouter"])){  // si on clique sur le bouton on recupere le libelle et la description
           
            $libelle = $_POST["libelle"]; // recupere le libelle 
            $description = $_POST["description"];// recupere la description

            if(!empty($libelle) && !empty($description)){  // libelle et description sont des champs obligatoire 
                    require_once "include/database.php"; // importer la base de donnés
                    $sqlState = $pdo->prepare ("INSERT INTO categorie (libelle,description) VALUES (?,?)"); // inserer le champs libelle et description dans la base de données
                    $sqlState->execute([$libelle, $description]); // execution pour inserer les donnes
                    header("location: categories.php") // on envoi l'utilisateur sur la page categories.php
                    ?>
                    <div class = "alert alert-success" role="alert"> <!-- message de succes pour dire que la categorie à bien était ajouté-->
                        la categorie  <?php echo $libelle  // pour afficher le libelle qu'on a ajouter ?> est bien ajouté. 
                    </div>
                    <?php
                
                
            
            }else{ // sinon 

                    ?>
                    <div class = "alert alert-danger" role="alert"> <!-- message d'alerte si les champs ne sont pas rempli-->
                        Libelle, description sont obligatoires ! 
                    </div>
                    <?php

              }  

            }
            
               
          ?>


 
            <form method="post"> <!--pour des raison de sécurité on va utiliser la methode post a la place de get  -->
            
               

                <label  class="form-label">Libelle</label>
                <input   class="form-control" name="libelle" >  
                
                <label  class="form-label">Description</label>
                <textarea   class="form-control" name="description" > </textarea> <!--form control form qui permet de modifier la structure dun block--> 
                <!--text area permet d'afficher text multiligne--> 
                
                <input type="submit" value="Ajouter categorie" class="btn btn-primary btn my-2" name="ajouter"> <!--my-2 pour descendre le bouton, name=ajouter pour pouvoir le recuperer apres-->

            </form>

     </div>
     </body>
</html>