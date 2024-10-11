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
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<title>Rekisteröidy</title>
<link rel="stylesheet" href="/siiri/styles.css">
</head>
<body>
  <form action="/siiri/rekisteroidy.php" method="post">
    <div class="container4">
    <h3>Luo käyttäjätunnus ja salasana</h3>
    
    <label for="uname2"><b>Käyttäjätunnus:</b></label>
    <input type="text" placeholder="Syötä käyttäjätunnus" name="uname" required>

    <label for="psw2"><b>Salasana:</b></label>
    <input type="password" placeholder="Syötä salasana" name="psw" required>

    <p><button type="submit" class="sendbtn">Rekisteröidy</button></p>
  </form>
  </div>
</body>
</html>