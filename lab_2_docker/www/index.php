<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
 document.getElementById("panel").setAttribute("w3-grey");
function sql(){

document.getElementById("panel").className="w3-panel w3-gray"

const prodotto = document.getElementById('prodotto').value

const sql = "select prodotto,descrizione from prodotti WHERE id="+prodotto+"";
document.getElementById("sqlview").innerHTML=sql;

}


</script>


</head>

<body>
<br><br><br><br><br>
<div align="center">

<h2>Data exfiltration</h2>

<p>In questo database oltre alla tabella dei prodotti vi è quella dedicata all'autenticazione degli utenti contenenti le colonne "utente" e "password"</p>

<p>Questo lab &egrave; uguale al precedente ma dovrai stavolta scoprire prima il nome della tabella degli utenti per poter esfiltrare i dati</p>

<p>Per completare correttamente la sfida, dovrai riuscire ad autenticarti <strong><a href="login/">QUI</a></strong></p>



<form method="GET" action="view.php" >

<table>

<tr>
<td>ID prodotto da vedere</td>
<td><input type="text" id="prodotto" name="prodotto" value="" onkeyup="sql()" onkeydown="sql()" placeholder="Inserisci ID del prodotto" /></td>
</tr>
<tr><br>
<td><input type="submit" value="Visualizza dettagli" /></td>
</tr>
</table>
<br><br>
<p>Suggerimento: Consulta l'indirizzo <strong>https://portswigger.net/web-security/sql-injection/cheat-sheet</strong> alla sezione <strong>Database contents</strong> per <strong>MySQL</strong></p>
<div id="panel" class="w3-panel">
    <p id ="sqlview"></p>
  </div>
</div>
</body>
</div>
</html>
