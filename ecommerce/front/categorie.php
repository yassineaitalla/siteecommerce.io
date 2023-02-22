<?php 
require_once "../include/database.php"; // les deux points / nous permet de sortir de notre fichier 
$id = $_GET['id'];
$sqlState = $pdo->prepare("SELECT * FROM categorie WHERE id=?"); // recupere la table categorie par apport à l'id selectionner
$sqlState->execute([$id]);
$categorie = $sqlState->fetch(PDO::FETCH_ASSOC); // fetch pour récuperer qu'une seule c atégorie
//var_dump($categorie);
// prepare car on aura besoin d'une valeur dans l'url
// var_dump($categories); // test pour afficher la liste des categories

$sqlState = $pdo->prepare("SELECT * FROM produits WHERE id_categorie=?"); 
$sqlState->execute([$id]);
$produits = $sqlState->fetchAll((PDO::FETCH_OBJ));
//var_dump($produits); // var_dump pour faire le test et afficher nos produits



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  -->

    <title>Categorie |  <?php echo $categorie["libelle"]?></title> <!--Afficher le titre Categorie de fruits -->
    
</head>
<body> 
<?php include '../include/nav_front.php' ?> <!--Importer le nav_front.php -->
<div class="container py-2"> <!--Pour décaler un peu a droite les labels et les champs de saisie-->
    <h4><?php echo $categorie["libelle"]?></h4>   <!--Afficher libelle de la categorie -->   
    <div class="container">
       <div class="row">
            <?php 
                foreach ($produits as $produit){ 
                    ?>
                    <div class="card mb-3 col-md-4"> <!-- -->
                        <img class="card-img-top" src="https://i.picsum.photos/id/244/200/200.jpg?hmac=Q1gdvE6ZPZUX3nXkxvmzuc12eKVZ9XVEmSH3nCJ2OOo" width="200%" height="300%"alt="Card image cap"> <!-- Importer une image pour test-->
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produit->libelle ?></h5> <!-- Affiche le libelle du produit -->
                            <p class="card-text"><?php echo $produit->prix ?>€</p>  <!-- Affiche le prix du produit -->

                        </div>
                    </div>

                    <?php 
                    
                    
                }
            ?>
            <div class="card mb-3 col-md-4">
                <img class="card-img-top" src="" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            
            <div class="card mb-3 col-md-4">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            
            <div class="card mb-3 col-md-4">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>

            <div class="card mb-3 col-md-4">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
             </div>

            <div class="card mb-3 col-md-4">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            </div>

            <div class="card mb-3 col-md-4">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>

            

</div>
</body>
</html>