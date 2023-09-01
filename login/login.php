<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "cadastraUsuario";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

$sql = "SELECT id FROM usuarios WHERE email = ? AND senha = ?";

if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("ss", $email, $senha);

    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            header("Location: cad.php");
            exit();
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Erro na preparação da consulta: " . $mysqli->error;
}

$mysqli->close();
?>
