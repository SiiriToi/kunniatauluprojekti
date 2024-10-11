<?php
// Yhdistä tietokantaan
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retrogamehouse_high_score_hall_of_fame";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}

if (isset($_COOKIE["sessionid"])) {
  unset($_COOKIE["sessionid"]); 
}
setcookie("sessionid", 'ttttt', time() + (180), "/");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<title>Kirjautuminen</title>
<link rel="stylesheet" href="/siiri/styles.css">
</head>
<body>

<form action="/siiri/etusivu.php" method="post">
  <div class="imgcontainer">
  <h3><b>Kirjaudu sisään</b></h3>
    <img src="imgavatar.png" alt="Avatar" class="avatar">
  </div>

<?php
if (isset($_GET["k"])) {
  echo "<p><div style ='background-color: rgba(255, 99, 71, 0.5); height: 100px; text-align: center;'>Käyttäjätunnusta ei ole. Rekisteröidy.</div></p>";
}
?>

  <div class="container2">
    <label for="uname"><b>Käyttäjätunnus:</b></label>
    <input type="text" id="uname" placeholder="Syötä käyttäjätunnus" name="uname" required>

    <label for="psw"><b>Salasana:</b></label>
    <input type="password" id="psw" placeholder="Syötä salasana" name="psw" required>
        
    <p><button type="submit" class="loginbtn">Kirjaudu sisään</button></p>
   
  </div>
  </form>
 
  <div class="container2">  
  <p><label><input type="checkbox" checked="checked" name="muista"> Muista minut</label></p><br>
  <span class="rekst"><a href="/siiri/rekisteröidy.php">Rekisteröidy</a><br><a href="/siiri/unoh-salasana.php">Unohditko salasanasi?</a></span>
  <button type="button" class="cancelbtn" onclick="peruuta()">Peruuta</button>
    <span class="psw"></span>
  </div>
  <script>
    function peruuta() {
      document.getElementById('uname').value = '';
      document.getElementById('psw').value = '';
    }
  </script>
</body>
</html>