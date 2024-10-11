<?php
session_start(); // Aloita istunto

// Poista evästeet
if (isset($_COOKIE["test_cookie"])) {
    setcookie("test_cookie", "", time() - 3600, "/");
}

// Tuhotaan istunto
session_unset(); // Poistaa kaikki istuntoon liittyvät muuttujat
session_destroy(); // Tuhotaan istunto

// Ohjaa käyttäjä kirjautumissivulle
header("Location: /siiri/kirjautuminen.php");
exit();
?>
