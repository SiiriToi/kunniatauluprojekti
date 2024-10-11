<!DOCTYPE html>
  <html lang="fi">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        margin-top: 50px;
        max-width: 600px;
    }
    .notification {
        margin-top: 20px;
        padding: 15px;
        border-radius: 5px;
        text-align: center;
        color: white;
    }
    .success {
        background-color: #32CD32;
    }
    .error {
        background-color: rgba(255, 99, 71, 0.5);
    }
    </style>
</head>
<body>

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

// Hae käyttäjätunnus
$uname = $_POST['uname'];
$psw = $_POST['psw'];
$sql1 = "SELECT COUNT(*) FROM sivustolle_kirjautuminen WHERE kayttajatunnus = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("s", $uname);
$stmt1->execute();
$stmt1->bind_result($onjo);
$stmt1->fetch();
$stmt1->close();

// Tässä aloitetaan session
session_start();
$_SESSION["kayttajatunnus"] = $uname;
$_SESSION["salasana"] = $psw;

if ($onjo) {
    echo "<a href='/siiri/kirjautuminen.php'><div style ='background-color: rgba(255, 99, 71, 0.5); height: 100px; text-align: center;'>Käyttäjätunnus on jo olemassa! Unohtuiko salasana?<b/></a></div>";
} else {
    // Tarkista onko käyttäjätunnus olemassa
    $sql = "SELECT kayttajatunnus, salasana FROM sivustolle_kirjautuminen WHERE kayttajatunnus = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowcount = $result->num_rows;
    $stmt->close();

    // Jos käyttäjätunnusta ei löydy, luodaan uusi
    if ($rowcount == 0) {
        $psw = $_POST['psw'];
        $sql = "INSERT INTO sivustolle_kirjautuminen (kayttajatunnus, salasana) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $uname, $psw);

        if ($stmt->execute() === TRUE) {
            echo "<a href='/siiri/kirjautuminen.php'><div style ='background-color:#32CD32; height: 100px; text-align: center;'><p class='tallennus' id='muutto'>Käyttäjätunnus on luotu! Voit kirjautua!</p></div></a>";
        } else {
            echo "Virhe lisättäessä tietoja: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
</body>
</html>