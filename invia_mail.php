<?php
//Includi le classi PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//require_once 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Recupera i dati dal form
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$data = $_POST['data'];
//$ora = $_POST['ora'];

// Crea il corpo della mail
$corpo = "Hai prenotato una visita per il giorno $data.";

// Crea un'istanza della classe PHPMailer
$mail = new PHPMailer(true);

try {
    // Imposta i parametri di connessione SMTP
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lorenzoyzf@gmail.com';
    $mail->Password = 'ErikaS06!';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Imposta il mittente e il destinatario
    $mail->setFrom('lorenzoyzf@gmail.com', 'Lorenzo');
    $mail->addAddress($email, $nome . ' ' . $cognome);

    // Imposta il soggetto e il corpo della mail
    $mail->isHTML(true);
    $mail->Subject = 'Prenotazione visita';
    $mail->Body = $corpo;

    // Invia la mail
    $mail->send();
    echo 'Messaggio inviato correttamente';
} 
catch (Exception $e) {
    echo 'Errore durante l\'invio del messaggio: ' . $mail->ErrorInfo;
}

?>