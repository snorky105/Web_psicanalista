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
    $mail->Host = 'out.virgilio.it';
    $mail->SMTPAuth = true;
    $mail->Username = 'ludovica.soggia@virgilio.it';
    $mail->Password = 'LudovicaSogg1a18!';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Imposta il mittente e il destinatario
    $mail->setFrom('ludovica.soggia@virgilio.it', 'Ludovica');
    $mail->addAddress($email, $nome . ' ' . $cognome);

    // Imposta il soggetto e il corpo della mail
    $mail->isHTML(true);
    $mail->Subject = 'Prenotazione visita';
    $mail->Body = $corpo;

    // Invia la mail
    $mail->send();
    echo "<script>alert('Messaggio inviato correttamente');setTimeout(function(){window.location.href='contacts.html'}, 4000);</script>";
} 
catch (Exception $e) {
    echo 'Errore durante l\'invio del messaggio: ' . $mail->ErrorInfo;
}
?>