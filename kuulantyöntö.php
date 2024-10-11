<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retrogamehouse_high_score_hall_of_fame";

$uname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

// Tarkistetaan yhteys
if ($conn->connect_error) {
  die("Yhteys epäonnistui: " . $conn->connect_error);
}

// Haetaan tiedot tietokannasta
$sql = "SELECT sijoitus, kayttajanimi, tulos, paivamaara FROM kuulantyöntö_tulokset";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Kuulantyöntö tulokset</title>
  <link rel="stylesheet" href="/siiri/styles.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container6">
  <h2><b>Kuulantyöntö</b></h2>
  <!-- Taulukko, johon tiedot lisätään -->
  <table id="kuulantyöntö_tulokset" border="1">
    <thead>
      <tr>
        <th>Sijoitus</th>
        <th>Käyttäjänimi</th>
        <th>Tulos</th>
        <th>Päivämäärä</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    <ul>
      <h4><b>Kuulantyöntö oli yksi tapahtuman jännittävimmistä lajeista. Kilpailijat antoivat kaikkensa työntääkseen kuulan mahdollisimman pitkälle, 
        ja nähtiin monia vaikuttavia suorituksia. Kilpailussa korostuivat voima, tekniikka ja keskittyminen, sillä jokainen senttimetri oli tärkeä.</b></h4>
      <h4><b>Kilpailijat käyttivät joko pakitus- tai pyörähdystekniikkaa, ja molemmilla tavoilla saavutettiin erinomaisia tuloksia.</b></h4> 
      <h4><b>Pakitustekniikka on perinteisempi, kun taas pyörähdystekniikka mahdollistaa suuremman vauhdin ja voiman käytön.</b></h4>
    </ul>
   <h2><b>Tulokset</b></h2>
  <?php
  $data = array();
  if ($result->num_rows > 0) {
    // Lisätään tulokset taulukkoon
    while($row = $result->fetch_assoc()) {
      $data[] = $row;
      echo '<tr>';
      echo '<td>';
      echo $row["sijoitus"];
      echo '</td>';
      echo '<td>';
      echo $row["kayttajanimi"];
      echo '</td>';
      echo '<td>';
      echo $row["tulos"];
      echo '</td>';
      echo '<td>';
      echo $row["paivamaara"];
      echo '</tr>';
    }
  }
  
  $conn->close();
?>
</div>
</tbody>
  </table>
  <body>
  <img id="img2" src="kuulantyöntäjä">
  <div class="center">
  <div class="pagination">
  <b><a href="/siiri/juoksu.php">&laquo;</a></b>
  <b><a href="/siiri/etusivu.php">1</a></b>
  <b><a href="/siiri/juoksu.php">2</a></b>
  <b><a href="/siiri/kuulantyöntö.php" class="active">3</a></b>
  <b><a href="/siiri/pituushyppy.php">4</a></b>
  <b><a href="/siiri/uinti.php">5</a></b>
  <b><a href="/siiri/pituushyppy.php">&raquo;</a></b>
  </div>
</div>
  <script>
    // Odotetaan, että sivu on ladattu
    document.addEventListener('DOMContentLoaded', function() {
      // Haetaan tiedot palvelimelta
      fetch('http://localhost/MySQL/retrogamehouse_high_score_hall_of_fame/kuulantyöntö_tulokset')
        .then(response => response.json()) // Muutetaan vastaus JSON-muotoon
        .then(data => {
          const tableBody = document.querySelector('#kuulantyöntö_tulokset tbody');
          // Käydään läpi saatu data ja lisätään se taulukkoon
          data.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${row.sijoitus}</td><td>${row.kayttajanimi}</td><td>${row.tulos}</td><td>${row.paivamaara}</td>`;
            tableBody.appendChild(tr); // Lisätään rivi taulukon runkoon
          });
        })
        .catch(error => console.error('Yhteys epäonnistui:', error)); // Käsitellään mahdolliset virheet
    });
  </script>
  <?php include 'footer.php'; ?>
</body>
</html>