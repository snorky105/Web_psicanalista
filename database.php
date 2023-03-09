<?php
// Connessione al database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "nomedatabase";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica le credenziali dell'utente
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inizializza la sessione
        session_start();
        $_SESSION['username'] = $username;

        // Redirect alla pagina di conferma prenotazione
        header("Location: conferma_prenotazione.php");
        exit();
    } else {
        echo "Username o password errati.";
    }
}

// Form di login
echo "<form method='post'>";
echo "<label>Username:</label>";
echo "<input type='text' name='username'><br>";
echo "<label>Password:</label>";
echo "<input type='password' name='password'><br>";
echo "<input type='submit' name='submit' value='Login'>";
echo "</form>";

$conn->close();
?>
