<?php
function openConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bemtequiz";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }

    return $conn;
}

function closeConnection($conn) {
    $conn->close();
}
?>
