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
  header('Location: /siiri/kirjautuminen.php');
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
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<title>Etusivu</title>
<link rel="stylesheet" href="/siiri/styles.css">
</head>
<body>
<?php include 'header.php'; ?>
  <div class="urheilu-etusivu">
<div class="container">
<h1><b>High Score Hall Of Fame - Taitaja 2024</b></h1>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Hae kilpailuja</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Etsi..." id="myInput" onkeyup="filterFunction()">
    <a href="/siiri/juoksu.php">Juoksu</a>
    <a href="/siiri/kuulantyöntö.php">Kuulantyöntö</a>
    <a href="/siiri/pituushyppy.php">Pituushyppy</a>
    <a href="/siiri/uinti.php">Uinti</a>
  </div>
</div>

<script>
/*Kun käyttäjä napsauttaa painiketta,
vaihtaa avattavan valikon sisällön piilottamisen ja näyttämisen välillä*/
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  const input = document.getElementById("myInput");
  const filter = input.value.toUpperCase();
  const div = document.getElementById("myDropdown");
  const a = div.getElementsByTagName("a");
  for (let i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
    <h2><b>Kunniagalleria</b></h2>
    <ul>
        <h4><b>Tervetuloa Taitaja 2024 urheilutapahtuman kunniagalleriaan! Tässä galleriassa juhlistamme kilpailijoiden upeita suorituksia ja saavutuksia eri lajeissa.</b></h4> 
        <h4><b>Tämän vuoden tapahtumassa kilpailtiin lajeissa juoksu, kuulantyöntö, pituushyppy ja uinti.</b></h4>
        <h4><b>Etusivulta pääset helposti näkemään kaikkien kilpailijoiden tulokset ja vertailemaan heidän suorituksiaan.</b></h4>
        <h4><b>Tule mukaan ihailemaan urheilijoiden huippusuorituksia ja inspiroitumaan heidän saavutuksistaan!</b></h4>
    </ul>
<h2><b>Kilpailu tapahtumat</b></h2>
    <p><li><a href="/siiri/juoksu.php">Juoksu</a></li></p>
    <p><li><a href="/siiri/kuulantyöntö.php">Kuulantyöntö</a></li></p>
    <p><li><a href="/siiri/pituushyppy.php">Pituushyppy</a></li></p>
    <p><li><a href="/siiri/uinti.php">Uinti</a></li></p>
    <div class="center">
  <div class="pagination">
  <b><a href="/siiri/etusivu.php" class="active">1</a></b>
  <b><a href="/siiri/juoksu.php">2</a></b>
  <b><a href="/siiri/kuulantyöntö.php">3</a></b>
  <b><a href="/siiri/pituushyppy.php">4</a></b>
  <b><a href="/siiri/uinti.php">5</a></b>
  <b><a href="/siiri/juoksu.php">&raquo;</a></b>
  </div>
  <?php include 'footer.php'; ?>
</div>
  </div>
</div>
</body>
  </head>
</html>
