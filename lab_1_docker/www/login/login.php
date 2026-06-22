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

    $preparedStatement = $conn->prepare('SELECT * FROM utenti WHERE user=? AND password=?');
    $preparedStatement->bind_param('ss', $u, $p);
    $preparedStatement->execute();
    $result = $preparedStatement->get_result();

    if ($result->num_rows > 0) {
        die("Congratulazioni! ti sei autenticato! ecco la tua flag: ce1cbd6d-0d15-4641-9e0e-86eab1cdc6a8");
    } else {
        header("Location: /login/index.php?error=1");
    }

} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
