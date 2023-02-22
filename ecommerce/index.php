<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  -->

    <title>Document</title> <!--titre  --> 
</head>
<body> 
     <?php 
     include "include/nav.php" /* importer le fichier nav.php*/?> 
     <div class="container"> <!--Pour décaler un peu a droite les labels et les champs de saisie-->
          <?php 
            if(isset($_POST["ajouter"])) /* si le bouton ajouter a etait cliquer alors affiche yes on récupere le $post car on a la méthode post en bas*/ 
            {   
                $login = $_POST["login"]; // varibale login 
                $pwd = md5("password"); // variable password dans la quelle on à rajouter un hashage de mot de passe
              
                
                if(!empty($login) && !empty($pwd))    /*champs de saisie obligatoire    */
                {  
                    require_once "include/database.php";  /* require once sert a lappeler que une seule fois ps plusieurs fois il est utiliser pour dire qui faut obligatoirement le require pour acceder a la base de donnes */  
                    $date = date("Y-m-d"); /* afficher la date en jour mois et année pour les mettres dans la base de donnes */  
                    
                    $sqlState =$pdo->prepare("INSERT INTO utilisateur VALUES(null,?,?,?)"); /*null, pour lid car c'est la base de donnes qui sen charge    */
                    $sqlState->execute([$login, $pwd, $date]); /*[] tableau de valeur */
                     // Redirection  
                     header ("location: connexion.php");} // une fois cliquer sur le bouton sa nous renvoie ver la page connexion.php
                   
                    else
                {
                    ?>
                    <div class="alert alert-danger" role="alert"> <!-- affiche une alerte en cas derreur -->
                      Login,password sont obligatoires!
                    </div>
                    <?php
                    }
                
            }

        
        ?>



          <form method="post"> <!--pour des raison de sécurité on va utiliser la methode post a la place de get  -->
            
                <!--LABEL: LOGIN ET MOT DE PASSE-->

                <label  class="form-label">Login</label>
                <input   class="form-control" name="login" >
                
                <label  class="form-label">password</label>
                <input type="password"  class="form-control" name="password" > <!--type password pour mettre en mode mot de passe-->
                
                <input type="submit" value="Ajouter un utilisateur" class="btn btn-primary btn my-2" name="ajouter"> <!--my-2 pour descendre le bouton, name=ajouter pour pouvoir le recuperer apres-->


            </form>

     </div>
     



</body>
</html>