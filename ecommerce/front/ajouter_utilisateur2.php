<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Créer un compte</title>
</head>
<body style="background: linear-gradient(to bottom, #87ceeb, #f7b957, #ff6825);height: 100vh;;"></body>
<?php include '../include/nav_front.php' ?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container py-5" >
    <div class="d-flex justify-content-center">
        <div class="col-md-6 col-lg-5 ">
            <div class="card shadow-lg">
                <div class="card-body"  style= "background: linear-gradient(to bottom, #87ceeb, #f7b957, #ff6825)" >
                    <h4 class="card-title mb-4" style="text-align: center;">Créer un compte</h4>
                    <?php
                    if (isset($_POST['ajouter'])) {
                        $login = $_POST['login'];
                        $pwd = $_POST['password'];
                        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

                        if (!empty($login) && !empty($pwd)) {
                            require_once '../include/database.php';
                            $date = date('Y-m-d');
                            $sqlState = $pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?)');
                            $sqlState->execute([$login, $hashed_pwd, $date]);
                            // Redirection
                            echo "Votre compe à bien était créé";
                            header('location: Connexion2.php');
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Login, mot de passe sont obligatoires
                            </div>
                            <?php
                        }

                    }
                    ?>
                    <form method="post" autocomplete="off">
                        <div class="form-group">
                            <label class="form-label">Login</label>
                            <input type="text" class="form-control" name="login">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Vous avez déjà un compte ?</label>
                            <a href="Connexion2.php" class="card-link">Se connecter</a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block my-3" name="ajouter">Suivant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
