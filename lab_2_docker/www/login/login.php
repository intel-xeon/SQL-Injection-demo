<?php
$db   = "SQLI_Exercise";
$user = "root";
$pass = "root";
$ip   = "db";

try {
    $conn = new mysqli($ip, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $u = $_POST['username'];
    $p = $_POST['password'];

    // Tabella reale nel DB: utenti_ongualki (colonne: utente, password)
    $preparedStatement = $conn->prepare('SELECT * FROM utenti_ongualki WHERE utente=? AND password=?');
    $preparedStatement->bind_param('ss', $u, $p);
    $preparedStatement->execute();
    $result = $preparedStatement->get_result();

    if ($result->num_rows > 0) {
        die("Congratulazioni! ti sei autenticato! ecco la tua flag: cf5f6160-6477-4615-b9ab-a0713fbd33ab");
    } else {
        header("Location: /login/index.php?error=1");
    }

} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
