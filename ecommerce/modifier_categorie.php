<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  -->

    <title>Modifier catégorie</title>
</head>
<body> 
<?php include "include/nav.php" /* importer le fichier nav.php*/?>
<div class="container py-2"> <!--Pour décaler un peu a droite les labels et les champs de saisie-->
    <h4>Modifier categorie</h4>
    <?php 
    require_once "include/database.php"; // recupere la base de données
    $sqlState = $pdo->prepare("SELECT * FROM categorie WHERE id=?");// prepare pour des questions de sécurité             query car je ne recupere rien chez l'utilisateur
    $id = $_GET["id"];
    $sqlState->execute([$id]);

    $category = $sqlState->fetch(PDO::FETCH_ASSOC); // assoc affiche le mode tableau
    if(isset($_POST["Modifier"])){
        
        $libelle = $_POST["libelle"]; // recupere le libelle 
        $description = $_POST["description"];// recupere la description

        if(!empty($libelle) && !empty($description)){  // libelle et description sont des champs obligatoire 
                 // importer la base de donnés
                $sqlState = $pdo->prepare ("UPDATE categorie SET libelle=?,description=? WHERE id= ?") ; // inserer le champs libelle et description dans la base de données
                $sqlState->execute([$libelle, $description, $id]); // execution pour inserer les donnes
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
                
                
                <input type="hidden" class="form-control" name="id"  value="<?php echo $category["id"]?>">  <!--pour récuperer l'id dans la base de données  -->
                <!-- pour la sécurité on utilise hidden pour cacher  -->

                <label  class="form-label">Libelle</label>
                <input   class="form-control" name="libelle" value="<?php echo $category["libelle"]?>">  <!-- pour récuperer le libelle dans la base de données-->
                <!--value car c'est un input -->

                
                
                <label  class="form-label">Description</label>
                <textarea   class="form-control" name="description"> <?php echo $category["description"]?> </textarea> <!--form control form qui permet de modifier la structure dun block--> 
                
                <!--text area permet d'afficher text multiligne-->
                <!--on met pas value car c'est une description--> 
                
                <input type="submit" value="Modifier catégorie" class="btn btn-primary btn my-2" name="Modifier"> <!--my-2 pour descendre le bouton, name=ajouter pour pouvoir le recuperer apres-->

            </form>

     </div>
     </body>
</html>