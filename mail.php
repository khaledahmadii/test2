<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/PHPMailer/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/PHPMailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer

$mail = $_POST['email'];
$nom = $_POST['nom'];
$message = $_POST['message'];
$numtel = $_POST['numtel'];

$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP(); // Utiliser SMTP
    $mail->Host = 'smtp.hostinger.com'; // Serveur SMTP de Hostinger
    $mail->SMTPAuth = true; // Authentification SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Cryptage TLS
    $mail->Port = 465; // Port SMTP


    $mail->Username = 'contact@concept-data.fr'; // YOUR gmail email
    $mail->Password = 'Khaledmm1*'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('contact@data-concepti.fr', 'data concept');
    $mail->addAddress($_POST['email'], $nom);

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "contact CDI";
    $mail->Body = 'Mr '.$_POST['nom'].'  Nous avons bien reçu votre demande<br> Nous vous tiendrons contacté dès que possible.';

    $mail->send();
    $mail->addAddress('contact@data-concept.fr', 'data concept');
    $mail->IsHTML(true);
    $mail->Body = 'Mr '.$_POST['nom'].'  a envoyer une demande de contact <br> message: '.$_POST['message'].'<br> numero de telephone: '.$_POST['numtel'].' <br>adresse email: '.$_POST['email'];
    $mail->send();

    header("Location: /");
} catch (Exception $e) {
    echo "<script>
      alert('verifier votre adresse mail ou votre numero de telephone');
    </script>";
       

}

//pour nous



?>