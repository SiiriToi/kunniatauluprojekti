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
$sql1 = "SELECT COUNT(*) FROM sivustolle_kirjautuminen WHERE kayttajatunnus = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("s", $uname);
$stmt1->execute();
$stmt1->bind_result($onjo);
$stmt1->fetch();
$stmt1->close();

if ($onjo > 0) {

    // Tarkista onko käyttäjätunnus olemassa
    $sql = "SELECT kayttajatunnus, salasana FROM sivustolle_kirjautuminen WHERE kayttajatunnus = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowcount = $result->num_rows;
    $stmt->close();

    // Jos käyttäjätunnusta ei löydy, luodaan uusi
        $psw = $_POST['pws'];
        $sql = "UPDATE sivustolle_kirjautuminen SET salasana = ? WHERE kayttajatunnus = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $psw, $uname);

        if ($stmt->execute() === TRUE) {
            echo "<a href='/siiri/kirjautuminen.php'><div style = 'background-color: MediumSeaGreen; height: 100px; text-align: center;'><p class='tallennus' id='muutto'>Salasana on vaihdettu! Voit kirjautua!</p></div></a>";
        } else {
            echo "Virhe lisättäessä tietoja: " . $stmt->error;
        }
        $stmt->close();
    }
else {
    echo "<a href='/siiri/rekisteröidy.php'><div style ='background-color: rgba(255, 99, 71, 0.5); height: 100px; text-align: center;'>Käyttäjätunnusta ei ole. Luo uusi tunnus.</a></div>";
}
$conn->close();
?>
</body>
</html>