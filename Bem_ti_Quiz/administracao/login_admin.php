<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_connection.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center">
    <div class="card rounded p-4">
        <h2 class="text-center">Login do Administrador</h2>
        <?php if (isset($erro)) {
            echo "<p class='text-danger'>$erro</p>";
        } ?>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning">Entrar</button>
        </form>
    </div>
</div>
</body>
</html>
