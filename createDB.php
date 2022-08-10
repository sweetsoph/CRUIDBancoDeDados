<?php
$servername = "localhost:3307";
$username = "root";
$password = "usbw";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE sistema";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Banco de Dados criado com sucesso<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>