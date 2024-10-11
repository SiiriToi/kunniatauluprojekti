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
  $sql = "SELECT sijoitus, kayttajanimi, tulos_metreina, paivamaara FROM juoksu_tulokset";
  $result = $conn->query($sql);

  $conn->close();
  ?>

  <!DOCTYPE html>
  <html lang="fi">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Juoksu tulokset</title>
    <link rel="stylesheet" href="/siiri/styles.css">
  </head>
  <body>
  <?php include 'header.php'; ?>
  <div class="container5">
    <h2><b>Juoksu</b></h2>
    <!-- Taulukko, johon tiedot lisätään -->
    <table id="juoksu_tulokset" border="1">
      <thead>
        <tr>
          <th>Sijoitus</th>
          <th>Käyttäjänimi</th>
          <th>Tulos (metreinä)</th>
          <th>Päivämäärä</th>
        </tr>
      </thead>
      <tbody>
        <ul>
          <h4><b>Juoksukilpailu oli yksi tapahtuman kohokohdista, ja siinä nähtiin monia upeita suorituksia. Kilpailijat osallistuivat eri matkoille, kuten 1300 metrin, 
            1400 metrin ja 1500 metrin juoksuun. Jokainen matka vaati erilaista taktiikkaa ja kestävyyttä, ja kilpailijat antoivat kaikkensa saavuttaakseen parhaat mahdolliset tulokset.</b></h4>
          <h4><b>1300 metrin pikajuoksussa korostui nopeus ja räjähtävä lähtö, kun taas 1400 metrin juoksussa tarvittiin sekä nopeutta että kestävyyttä.</b></h4>
          <h4><b>1500 metrin juoksu oli todellinen kestävyyskoe, jossa kilpailijat joutuivat jakamaan voimansa tarkasti koko matkan ajan.</b></h4>
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
      echo $row["tulos_metreina"];
      echo '</td>';
      echo '<td>';
      echo $row["paivamaara"];
      echo '</tr>';
    }
  }
?>
</div>
</tbody>
</table>
<body>
  <img id="img" src="juoksijat">
    <div class="center">
  <div class="pagination">
  <b><a href="/siiri/etusivu.php">&laquo;</a></b>
  <b><a href="/siiri/etusivu.php">1</a></b>
  <b><a href="/siiri/juoksu.php" class="active">2</a></b>
  <b><a href="/siiri/kuulantyöntö.php">3</a></b>
  <b><a href="/siiri/pituushyppy.php">4</a></b>
  <b><a href="/siiri/uinti.php">5</a></b>
  <b><a href="/siiri/kuulantyöntö.php">&raquo;</a></b>
  </div>
</div>
  <script>
    // Odotetaan, että sivu on ladattu
    document.addEventListener('DOMContentLoaded', function() {
      // Haetaan tiedot palvelimelta
      fetch('http://localhost/MySQL/retrogamehouse_high_score_hall_of_fame/juoksu_tulokset')
        .then(response => response.json()) // Muutetaan vastaus JSON-muotoon
        .then(data => {
          const tableBody = document.querySelector('#juoksu_tulokset tbody');
          // Käydään läpi saatu data ja lisätään se taulukkoon
          data.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${row.sijoitus}</td><td>${row.kayttajanimi}</td><td>${row.tulos_metreina}</td><td>${row.paivamaara}</td>`;
            tableBody.appendChild(tr); // Lisätään rivi taulukon runkoon
          });
        })
        .catch(error => console.error('Yhteys epäonnistui:', error)); // Käsitellään mahdolliset virheet
    });
  </script>
  <?php include 'footer.php'; ?>
</body>
</html>