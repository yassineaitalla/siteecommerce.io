<?php
    session_start();
?>

<nav class="navbar navbar-expand-lg bg-light" style="background-color: #5f22e1; width: 100%;">
    <div class="container-fluid">
        <img src="images/yasoshop.png" alt="logo" style="float: left; margin-right: 15px; width: 75px;"> 
        <a class="navbar-brand" href="#" style="font-size: 2em; margin-top: -8px; margin-left: -8px">YasoSho<span style="color:chartreuse">P</span></a>
      
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarNav" >
            <ul class="navbar-nav d-flex w-100 justify-content-center ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home fa-lg"></i>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-info-circle"></i>En savoir plus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-envelope"></i>Contact</a>
                </li>

                <!-- verifie si une session est active -->
                <?php if (isset($_SESSION['utilisateur'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="deconnexion.php" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?')">
                            <i class="fas fa-sign-out-alt"></i>Déconnexion  
                        </a> 
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"> Bonjour <?php echo $_SESSION['utilisateur']['login'] ?>, nous vous invitons à débuter vos achats en toute sécurité.</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="ajouter_utilisateur2.php"><i class="fas fa-user-plus"></i>Créer un compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Connexion2.php"><i class="fas fa-sign-in-alt"></i>Connexion</a>
                    </li>
                <?php endif; ?> 
            </ul>
        </div>

        <?php
        $productCount = 0;
        if (isset($_SESSION['utilisateur'])) {
            $idUtilisateur = $_SESSION['utilisateur']['id'];
            $productCount = count($_SESSION['panier'][$idUtilisateur] ?? []);
        }
        function calculerRemise($prix, $discount)
        {
            return $prix - (($prix * $discount) / 100);
        }
        ?>

        <a class="btn float-end" href="panier.php"><i class="fa-solid fa-cart-shopping"></i> Panier
            (<?php echo $productCount; ?>)</a>
    </div>
</nav>