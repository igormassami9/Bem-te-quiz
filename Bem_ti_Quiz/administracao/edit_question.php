<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_pergunta'])) {
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

        $sql_categorias = "SELECT * FROM categorias";
        $result_categorias = $conn->query($sql_categorias);

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Editar Pergunta - BemTeQuiz</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <div class="container mt-5">
                <h1 class="text-center">Editar Pergunta</h1>
                <form action="update_question.php" method="post">
                    <input type="hidden" name="id_pergunta" value="<?php echo $id_pergunta; ?>">
                    <div class="mb-3">
                        <label for="pergunta" class="form-label">Pergunta:</label>
                        <input type="text" class="form-control" name="pergunta" value="<?php echo $pergunta; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria:</label>
                        <select class="form-select" name="categoria" required>
                            <?php
                            while ($categoria_row = $result_categorias->fetch_assoc()) {
                                $categoria_id = $categoria_row['id'];
                                $categoria_nome = $categoria_row['nome'];
                                $selected = ($categoria_id == $categoria) ? 'selected' : '';
                                echo "<option value='$categoria_id' $selected>$categoria_nome</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="curiosidades" class="form-label">Curiosidade:</label>
                        <textarea class="form-control" name="curiosidades" rows="4" required><?php echo $curiosidades; ?></textarea>
                    </div>
                    <h2>Respostas:</h2>
                    <?php
                    while ($resposta_row = $result_respostas->fetch_assoc()) {
                        $resposta_id = $resposta_row['id'];
                        $resposta_text = $resposta_row['resposta'];
                        $correta = $resposta_row['correta'];
                        ?>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="resposta[<?php echo $resposta_id; ?>]" value="<?php echo $resposta_text; ?>" required>
                            Correta <input type="radio" name="correta" value="<?php echo $resposta_id; ?>" <?php echo ($correta == 1) ? 'checked' : ''; ?>>
                        </div>
                        <?php
                    }
                    ?>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
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
