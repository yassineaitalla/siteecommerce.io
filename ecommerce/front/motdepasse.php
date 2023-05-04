<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
<?php include '../include/nav_front.php' ?>
<div class="container py-2">
    <?php
        if(isset($_POST['reset'])){
            $email = $_POST['login'];

            if(!empty($email)){
                require_once '../include/database.php';
                $sqlState = $pdo->prepare('SELECT * FROM utilisateur 
                                                WHERE login=?');
                $sqlState->execute([$email]);
                if($sqlState->rowCount()>=1){
                    // Envoi d'un email de réinitialisation du mot de passe à l'utilisateur
                    // Ici, vous pouvez insérer votre code pour envoyer un email de réinitialisation du mot de passe
                    ?>
                    <div class="alert alert-success" role="alert">
                        Un email a été envoyé à l'adresse <?php echo $email; ?> avec des instructions pour réinitialiser votre mot de passe.
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Aucun compte n'a été trouvé avec cette adresse email.
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    L'adresse email est obligatoire
                </div>
                <?php
            }
        }
    ?>
    <h4>Réinitialiser le mot de passe</h4>
    <form method="post">
        <label class="form-label">Adresse email</label>
        <input type="login" class="form-control" name="login">

        <input type="submit" value="Réinitialiser" class="btn btn-primary my-2" name="reset">
    </form>
</div>
</body>
</html>
