<?php
session_start();
$_SESSION['statut'] = "vide";

header('Location: app/router/router1.php?action=truc');

?>

