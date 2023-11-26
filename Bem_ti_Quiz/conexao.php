<?php
$servername = "127.0.0.1:3306";
 $username = "u383961694_admin24";
 $password = "Bemtequiz123@";
 $database = "u383961694_bemtequiz";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$conn->set_charset("utf8");

return $conn;
?>
