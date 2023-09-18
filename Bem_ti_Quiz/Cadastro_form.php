<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "Bemtiquiz");

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location: Index.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    $conn->close();
}
?>
