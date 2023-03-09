<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processa il form di conferma/rifiuto della prenotazione
    if ($_POST["conferma"] == "si") {
        // Esegui l'azione di conferma della prenotazione
        // ad esempio, invia un'email di conferma al cliente
        echo "Prenotazione confermata con successo!";
    } else {
        // Esegui l'azione di rifiuto della prenotazione
        // ad esempio, invia un'email di rifiuto al cliente
        echo "Prenotazione rifiutata.";
    }
} else {
    // Mostra il form di conferma/rifiuto della prenotazione
?>

<form method="post">
    <label>Confermi la prenotazione?</label><br>
    <input type="radio" name="conferma" value="si"> Si<br>
    <input type="radio" name="conferma" value="no"> No<br><br>
    <input type="submit" value="Invia">
</form>
<?php
}
?>