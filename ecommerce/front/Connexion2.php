<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start(); 

include '../include/head.php';
?>

<!doctype html>
<html lang="en">
<head>
    <title>Connexion</title>
</head>

<body style="background: linear-gradient(to bottom, #87ceeb, #f7b957, #ff6825);height: 100vh;;"></body>

<?php include '../include/nav_front.php' ?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container py-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-6 col-lg-5 ">
            <div class="card shadow-lg">
                <div class="card-body" style="background: linear-gradient(to bottom, #87ceeb, #f7b957, #ff6825)">
                    <h4 class="card-title mb-4" style="text-align: center;">Connexion</h4>
                    <?php
                  
                    if (isset($_POST['connexion'])) {
                        $login = $_POST['login'];
                        $pwd = $_POST['password'];

                        if (!empty($login) && !empty($pwd)) {
                            require_once '../include/database.php';
                            $sqlState = $pdo->prepare('SELECT * FROM utilisateur WHERE login=?');
                            $sqlState->execute([$login]);

                            if ($sqlState->rowCount() >= 1) {
                                $user = $sqlState->fetch();
                                if (password_verify($pwd, $user['password'])) {
                                    $_SESSION['utilisateur'] = $user;
                                    if ($user['login'] == 'o') {
                                        header('location: ../index2.php');
                                        exit(); // Ajouter un exit() pour éviter l'affichage de données supplémentaires
                                    } else {
                                        header('location: pageproduit.php');
                                        exit(); // Ajouter un exit() pour éviter l'affichage de données supplémentaires
                                    }
                                }else{
                                    echo '<div class="alert alert-danger" role="alert">Login ou mot de passe incorrectes.</div>';
                                }
                            }else{
                                echo '<div class="alert alert-danger" role="alert">Login ou mot de passe incorrectes.</div>';
                            }
                        }else{
                            echo '<div class="alert alert-danger" role="alert">Login ou mot de passe sont obligatoires.</div>';
                        }
                    }
                    ?>
                    
                    <form method="post" autocomplete="off">
                        <div class="form-group">
                            <label class="form-label">Login</label>
                            <input type="text" class="form-control" name="login">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Vous n'avez pas de compte ?</label>
                            <a href="ajouter_utilisateur2.php" class="card-link">Créer un compte </a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block my-3" name="connexion">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
