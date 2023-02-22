<?php
    session_start(); // 
    $connecte = false; // variable connecter qui prendra comme booellen (false) 
    if(isset($_SESSION['utilisateur'])){ // si lutilisateur est connecter ou pas 
          $connecte = true; // connexion valide
        
    }
    
    // var_dump($connecte); // var dump qui permet d'afficher si l'utilisateur est connecter ou pas 
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Yasoshop</a>  <!--le nom de notre site-->
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Ajouter utilisateur</a> <!--active permet d'enlever la couleur noir pour les titres-->
        </li>


        <?php
           if($connecte){        //si lutilisateur est connecté alors affiche categorie et produits 
              ?>
                
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="categories.php">Liste des catégories</a>  <!--Pour aller vers la page categorie.php-->
                </li>

                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="produits.php">Liste des produits</a>  <!--Pour aller vers la page categorie.php-->
                </li>
        
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="ajouter_categorie.php">Ajouter categorie</a>  <!--Pour aller vers la page categorie.php-->
                </li>
               
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="ajouter_produits.php">Ajouter produits</a> <!--Pour aller vers la page produits.php-->
                </li>

                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="deconnexion.php">Deconnexion</a> <!--Pour aller vers la page produits.php-->
                </li>
               
               <?php




        }else{  // sinon affiche connexion pour quil puisse se connecter
            ?>
        
            <li class="nav-item">
                <a class="nav-link" href="connexion.php">Connexion</a> <!--Pour aller vers la page connexion.php-->
            </li>
            </li> 

            <?php
        }
        ?>
        </li>
      </ul>
    </div>
  </div>
</nav>