<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  -->

    <title>Connexion</title>
</head>
<body> 
     <?php 
     include "include/nav.php" /* importer le fichier nav.php*/?> 
     
     
     <div class="container py-2"> <!--Pour décaler un peu a droite les labels et les champs de saisie-->
          <?php
              if(isset($_POST["connexion"])){   // si on clique sur connexion on recupere la valeur et le password
                $login = $_POST["login"];
                $pwd = $_POST["password"];

                if(!empty($login) && !empty($pwd)){
                    require_once "include/database.php";
                    $sqlState = $pdo->prepare("select * from utilisateur where login=?
                                                                         and password=?");
                    $sqlState->execute([$login,$pwd]);
                    if($sqlState->rowCount()>=1){
                        session_start();
                        $_SESSION["utilisateur"] = $sqlState->fetch();
                        header("location: admin.php"); // ça envoi vers la page admin.php
                    
                }else{
                    ?>
                    <div class = "alert alert-danger" role="alert">
                        Login, password sont incorrects
                    </div>
                    <?php
                }
                  
              }else{
                ?>
                <div class = "alert alert-danger" role="alert">
                        Login, password sont obligatoires !!!!!!!!! 
                </div>
                <?php
                
            }

        }

           
        ?>
               
         
        <h4>Connexion</h4>


        <form method="post"> <!--pour des raison de sécurité on va utiliser la methode post a la place de get  -->
            
                <!--LABEL: LOGIN ET MOT DE PASSE-->

                <label  class="form-label">Login</label>
                <input  class="form-control" name="login" >
                
                <label  class="form-label">password</label>
                <input  type="password"  class="form-control" name="password" > <!--type password pour mettre en mode mot de passe-->
                
                <input type="submit" value="Connexion" class="btn btn-primary btn my-2" name="connexion"> <!--my-2 pour descendre le bouton, name=ajouter pour pouvoir le recuperer apres-->


            </form>

     </div>
     



</body>
</html>