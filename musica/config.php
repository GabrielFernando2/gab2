<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "musica";

// Criar conexão
$conn = new mysqli($host, $user, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
