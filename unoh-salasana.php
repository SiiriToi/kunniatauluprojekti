<!DOCTYPE html>
<html lang="fi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Unohditko salasanasi?</title>
<link rel="stylesheet" href="/siiri/styles.css">
</head>
<body>
<form action="/siiri/salasanan_tallennus.php" method="post">
<div class="container3">
    <h3>Käyttäjätunnuksesi on sähköpostiosoite, syötä se Käyttäjätunnus-kenttään, syötä myös uusi salasana ja klikkaa Tallenna-painiketta.</h3>
    
    <label for="uname"><b>Käyttäjätunnus:</b></label>
    <input type="text" placeholder="Syötä käyttäjätunnus" name="uname" required>

    <label for="psw"><b>Uusi salasana:</b></label>
    <input type="password" placeholder="Syötä uusi salasana" name="pws" required>

    <p><button type="submit" class="sendbtn">Tallenna</button></p>
  </div> 
</form>
</body>
</html>