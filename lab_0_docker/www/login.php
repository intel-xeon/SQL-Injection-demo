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

    $sql    = "SELECT * FROM utenti WHERE utente='$u' AND password='$p'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        die("Congratulazioni!!! hai superato l'autenticazione!");
    } else {
        header("Location: /index.php?error=1");
    }

} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
