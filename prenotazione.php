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
$telefono = $_POST['telefono'];
$data = $_POST['data'];
//$ora = $_POST['ora'];

// Crea il corpo della mail
$corpo = "Hai prenotato una visita per il giorno $data.";
$corpo1 = "Il paziente $cognome $nome ha prenotato una visita per il giorno $data Il contatto telefonico del paziente è : $telefono." ;

// Crea un'istanza della classe PHPMailer
$mail = new PHPMailer(true);
$mail2 = new PHPMailer(true);

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

    //$mail2->SMTPDebug = 0;
    $mail2->isSMTP();
    $mail2->Host = 'out.virgilio.it';
    $mail2->SMTPAuth = true;
    $mail2->Username = 'ludovica.soggia@virgilio.it';
    $mail2->Password = 'LudovicaSogg1a18!';
    $mail2->SMTPSecure = 'ssl';
    $mail2->Port = 465;

    // Imposta il mittente e il destinatario
    $mail->setFrom('ludovica.soggia@virgilio.it', 'Ludovica');
    $mail->addAddress($email, $nome . ' ' . $cognome);
    $mail2->addAddress('lorenzoyzf@gmail.com', 'Antonio'); // impostare la mail del destinatario
    //$mail2->addAddress('antony96-the-best@hotmail.it', 'Antonio'); // impostare la mail del destinatario

    // Imposta il soggetto e il corpo della mail
    $mail->isHTML(true);
    $mail->Subject = 'Nuova Prenotazione visita';
    $mail->Body = $corpo;
    $mail2->Body = $corpo1;

    // Imposta il soggetto e il corpo della mail
    $mail2->isHTML(true);
    $mail2->Subject = 'PRENOTAZIONE';
    $mail2->Body = $corpo1;

    // Invia la mail
    $mail->send();
    $mail2->send();
    echo "<script>alert('Prenotazione Effettuata, riceverà conferma v');setTimeout(function(){window.location.href='contacts.html'}, 1000);</script>";
} 
catch (Exception $e) {
    echo 'Errore durante l\'invio del messaggio: ' . $mail->ErrorInfo;
    echo 'Errore durante l\'invio del messaggio: ' . $mail2->ErrorInfo;
}

// Mostra la pagina di conferma
include 'conferma_prenotazione.php';
?>