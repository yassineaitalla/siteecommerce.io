<?php

// Inclure les fichiers de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require(__DIR__."/../vendor/autoload.php");

// Vérifier si la méthode HTTP utilisée est "POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Configurer les informations du courriel
    $to = "yassine.aitalla@imie-paris.fr";
    $subject = "Message de $nom ($email)";
    $body = $message;

    // Créer un nouvel objet PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurer les paramètres du serveur SMTP
        $mail->SMTPDebug = 0;                     
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.outlook.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'yassine.aitalla@imie-paris.fr';                     
        $mail->Password   = 'Imzin45100@92';                              
        $mail->SMTPSecure = 'tls';         
        $mail->Port       = 587;                                    

        // Configurer les destinataires du courriel
        $mail->setFrom($email, $nom);
        $mail->addAddress('yassine.aitalla@imie-paris.fr');          

        // Configurer le contenu du courriel
        $mail->isHTML(true);                                 
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Envoyer le courriel
        $mail->send();
        echo 'Message envoyé';
    } catch (Exception $e) {
        // Afficher une erreur si le courriel n'a pas pu être envoyé
        echo "Message non envoyé. Erreur : {$mail->ErrorInfo}";
    }
}
?>
