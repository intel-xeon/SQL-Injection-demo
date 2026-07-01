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
    $p = hash('sha224', $_POST['password']);

    // Tabella reale nel DB: acc_t7vn2kqx (colonne: usr_hP5mW3r, pwd_jL8xB6s)
    $preparedStatement = $conn->prepare('SELECT * FROM acc_t7vn2kqx WHERE usr_hP5mW3r=? AND pwd_jL8xB6s=?');
    $preparedStatement->bind_param('ss', $u, $p);
    $preparedStatement->execute();
    $result = $preparedStatement->get_result();

    if ($result->num_rows > 0) {
        die("Congratulazioni! ti sei autenticato! ecco la tua flag: 7f2a1c9e-4b83-4d6f-a501-3c8e2d0b5f94");
    } else {
        header("Location: /login/index.php?error=1");
    }

} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
