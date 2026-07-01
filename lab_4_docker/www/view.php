<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Dettagli prodotti</h2>

<table>
  <tr>
    <th>Prodotto</th>
    <th>Descrizione</th>
  </tr>
<?php
$servername = "db";
$username   = "root";
$password   = "root";
$dbname     = "SQLI_Exercise";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id  = $_GET['prodotto'];
$sql = "SELECT prodotto, descrizione, NULL, NULL FROM prodotti WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["prodotto"] . "</td><td>" . $row["descrizione"] . "</td></tr>";
    }
} else {
    echo "<tr><td>Nessun prodotto da visualizzare...</td><td>Nessun prodotto da visualizzare...</td></tr>";
}
$conn->close();
?>
</table>
<a href="/">Clicca qui per tornare ai prodotti</a>
</body>
</html>
