<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "brief8";

// Connexion à la base de données
$sql = mysqli_connect($servername, $username, $password, $database);

// Vérifier la connexion
if (!$sql) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

?>