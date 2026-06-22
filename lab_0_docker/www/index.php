<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
 document.getElementById("panel").setAttribute("w3-grey");
function sql(){

document.getElementById("panel").className="w3-panel w3-gray"

const username = document.getElementById('username').value
const password = document.getElementById('password').value

const sql = "SELECT * FROM utenti WHERE utente='"+username+"' AND password='"+password+"'";
document.getElementById("sqlview").innerHTML=sql;

}



</script>


</head>

<body>
<br><br><br><br><br>
<div align="center">

<h2>Bypass dell'autenticazione</h2>

<p>In questa applicazione c'è solo un'utenza, il tuo obiettivo è accedere all'area riservata sfruttando le conoscenze apprese</p>

<form method="POST" action="login.php" >

<table>

<tr>
<td>User</td>
<td><input type="text" id="username" name="username" value="" onkeyup="sql()" onkeydown="sql()" placeholder="Inserisci username" /></td>
</tr>
<tr><br>
<td>Password</td>
<td><input type="password" id="password" name="password" onkeydown="sql()" onkeyup="sql()" value="" placeholder="Inserisci password" /></td>
</tr>
<tr><br>
<td><input type="submit" value="Login" /></td>
</tr>
</table>
<?php
if (isset($_GET['error'])){
echo "<a style='color:red'> Autenticazione fallita...</a>";
}

?>
</form>
 <div id="panel" class="w3-panel">
    <p id ="sqlview"></p>
  </div>
</div>

</div>
</body>
</div>
</html>
