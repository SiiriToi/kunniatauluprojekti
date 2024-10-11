<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retrogamehouse_high_score_hall_of_fame";

$uname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Yhteys epäonnistui: " . $conn->connect_error);
}

if(isset($_POST ["uname"])) {
  $uname = $_POST["uname"];
  $sql = "SELECT salasana FROM sivustolle_kirjautuminen WHERE kayttajatunnus = '$uname'";
  $result = $conn->query($sql);
  
  $psw = $_POST["psw"];

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   if ($psw != $row["salasana"]) {
    header('Location: /siiri/kirjautuminen.php');
   }
  }
} else {
  header('Location: /siiri/kirjautuminen.php?k=0');
}

$conn->close();
  
  $cookie_name = "sessionid";
  $cookie_value = $uname;
  setcookie("sessionid", $cookie_value, time() + (86400), "/"); // 86400 = 1 day
}

if (isset($_COOKIE["sessionid"]) && $_COOKIE["sessionid"] != "ttttt") {
  $uname = $_COOKIE["sessionid"];
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/siiri/styles.css">
</head>
<body>
<header> <?php echo "Olet kirjautuneena tunnuksella: " . $uname . ".<br>";?>
  <form action="/siiri/uloskirjautuminen.php" method="post" id="logoutForm">
  <p><button id="logoutbtn" type="submit" class="logoutbtn" onclick="confirmLogout(event)">Kirjaudu ulos</button></p>
  </form>  
</header>

<script>
function confirmLogout(event) {
  userConfirmed = confirm("Haluatko varmasti kirjautua ulos?");
  if (!userConfirmed) {
    event.preventDefault("logoutForm").submit(); /*estää lomakkeen lähettämisen*/
  }
}
</script>