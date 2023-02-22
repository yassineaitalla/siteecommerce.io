<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" > 
    <!--lien bootstrap pour importer le menu ainsi que toute les autres fonctionalite  -->

    <title> Administrateur</title>
</head>
<body>
     <?php
     include "include/nav.php" /* importer le fichier nav.php*/?>


     <div class="container"> <!--Pour décaler un peu a droite les labels et les champs de saisie-->
          <?php
               
              if(!isset($_SESSION["utilisateur"])){  // si c'est pas un utilisteur alors on lenvoi se connecter d'abord 
                  header("location:connexion.php"); // pour envoyer vers connexion.php 
              }
              




          ?>


            <h3> Bonjour: <?php echo ($_SESSION["utilisateur"]["login"])   ?></h3> <!--afficher le nom de la personne qui sest connecté -->



            


</body>
</html>