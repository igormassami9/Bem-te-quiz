<!DOCTYPE html>
<html>
<head>
    <title>Lista de Perguntas - BemTeQuiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Perguntas</h1>

        <?php
        include('db_connection.php');

        $sql = "SELECT * FROM perguntas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>ID: " . $row["id"] . "</h5>";
                echo "<h6 class='card-subtitle mb-2 text-muted'>Categoria: " . $row["id_categorias"] . "</h6>";
                echo "<p class='card-text'>Pergunta: " . $row["pergunta"] . "</p>";

                echo "<a href='edit_question.php?id_pergunta=" . $row["id"] . "' class='btn btn-primary'>Editar</a>";

                echo "<a href='delete_question.php?id_pergunta=" . $row["id"] . "' class='btn btn-danger'>Excluir</a>";

                $id_pergunta = $row["id"];
                $respostasSql = "SELECT * FROM respostas WHERE pergunta_id = ? AND correta = 1";
                $stmt = $conn->prepare($respostasSql);
                $stmt->bind_param("i", $id_pergunta);
                $stmt->execute();
                $respostasResult = $stmt->get_result();

                if ($respostasResult->num_rows > 0) {
                    echo "<p class='card-text'><strong>Respostas Corretas:</strong></p>";
                    echo "<ul class='list-group'>";
                    while ($respostaRow = $respostasResult->fetch_assoc()) {
                        echo "<li class='list-group-item'>" . $respostaRow["resposta"] . "</li>";
                    }
                    echo "</ul>";
                }

                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-muted'>Nenhuma pergunta encontrada.</p>";
        }

        closeConnection($conn);
        ?>

        <a href="index_admin.php" class="btn btn-secondary">Voltar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
