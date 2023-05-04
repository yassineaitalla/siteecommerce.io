
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Admin</title>
</head> 
<body>
<?php include '../include/nav.php' ?>
<div class="container py-2">
    <?php
        if(!isset($_SESSION['utilisateur'])){
            header('location:   Connexion2.php');
        }
    ?>

        <h3 style="color:black"> Bonjour <?php echo $_SESSION['utilisateur']['login'] ?> vous etes administrateur modifer vos produits et categories</h3>
</div>

<div>



</div>

</body>
</html>