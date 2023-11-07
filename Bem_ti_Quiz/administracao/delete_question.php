<?php
include('db_connection.php');

if (isset($_GET['id_pergunta'])) {
    $id_pergunta = $_GET['id_pergunta'];

    $sql = "SELECT * FROM perguntas WHERE id = $id_pergunta";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pergunta = $row['pergunta'];
        $categoria = $row['id_categorias'];
        $curiosidades = $row['curiosidades'];

        $sql_respostas = "SELECT * FROM respostas WHERE pergunta_id = $id_pergunta";
        $result_respostas = $conn->query($sql_respostas);

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Confirmar Exclusão - BemTeQuiz</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <div class="container mt-5">
                <h1 class="text-center">Confirmar Exclusão</h1>
                <p>Tem certeza de que deseja excluir a pergunta a seguir e todas as respostas relacionadas?</p>
                <h4><?php echo $pergunta; ?></h4>
                <p>Categoria: <?php echo $categoria; ?></p>
                <p>Curiosidade: <?php echo $curiosidades; ?></p>

                <h2>Respostas:</h2>
                <?php
                while ($resposta_row = $result_respostas->fetch_assoc()) {
                    $resposta_text = $resposta_row['resposta'];
                    echo "<p>$resposta_text</p>";
                }
                ?>
                <form action="delete_question.php" method="post">
                    <input type="hidden" name="id_pergunta" value="<?php echo $id_pergunta; ?>">
                    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                </form>
                <a href="index_admin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Pergunta não encontrada.";
    }
} else {
    echo "ID de pergunta não fornecido.";
}

closeConnection($conn);
?>
