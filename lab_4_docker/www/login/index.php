<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<br><br><br><br><br>
<div align="center">

<h2>Effettua l'autenticazione</h2>

<form method="POST" action="login.php">
<table>
<tr>
<td>User</td>
<td><input type="text" name="username" value="" placeholder="Inserisci username" /></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password" value="" placeholder="Inserisci password" /></td>
</tr>
<tr>
<td><input type="submit" value="Login" /></td>
</tr>
</table>
<a href="../">Clicca qui per tornare ai prodotti</a><br>

<?php
if (isset($_GET['error'])){
    echo "<a style='color:red'> Autenticazione fallita...</a>";
}
?>
</form>
</div>
</body>
</html>
