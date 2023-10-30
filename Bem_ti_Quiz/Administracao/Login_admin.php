<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "", "bemtequiz");

    if ($conn->connect_error) {
        die("Erro de conexão com o banco de dados: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT id FROM administradores WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: index_admin.php");
    } else {
        $erro = "Credenciais inválidas. Tente novamente.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tela de Login do Administrador</title>
</head>
<body>
    <h2>Tela de Login do Administrador</h2>
    <?php if (isset($erro)) { echo "<p style='color:red;'>$erro</p>"; } ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="email">Email:</label>
        <input type="text" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
