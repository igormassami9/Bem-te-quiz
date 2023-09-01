<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="container mt-5">
        <h1>Cadastro concluído!</h1>
    </header>
    <main class="container">
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "cadastraUsuario";

        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_error) {
            die("Erro de conexão: " . $mysqli->connect_error);
        }

        $nome = $_GET["nome"] ?? "Sem nome";
        $email = $_GET["email"] ?? "Sem E-mail";
        $telefone = $_GET["telefone"] ?? "Sem telefone";
        $data = $_GET["data"] ?? "Sem data";
        $senha = $_GET["senha"] ?? "Sem senha";

        $sql = "INSERT INTO usuarios (nome, email, telefone, data_nascimento, senha) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssss", $nome, $email, $telefone, $data, $senha);

            if ($stmt->execute()) {
                echo "<p>Cadastro realizado com sucesso!</p>";
            } else {
                echo "<p>Erro ao cadastrar: " . $stmt->error . "</p>";
            }

            $stmt->close();
        } else {
            echo "<p>Erro na preparação da consulta: " . $mysqli->error . "</p>";
        }
        $mysqli->close();
        ?>
        <p><a href="../login/index.html" class="btn btn-primary">Voltar para a página anterior</a></p>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>