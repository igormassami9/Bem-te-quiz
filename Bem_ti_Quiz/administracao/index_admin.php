<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar BemTeQuiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Gerenciar Perguntas e Respostas</h1>

        <h2 class="mt-4">Adicionar Pergunta</h2>
        <form action="add_question.php" method="post">
            <div class="mb-3">
                <label for="pergunta" class="form-label">Pergunta:</label>
                <input type="text" class="form-control" name="pergunta" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <select class="form-select" name="categoria" required>
                    <option value="1">Fauna</option>
                    <option value="2">Flora</option>
                    <option value="3">História</option>
                    <option value="4">Bioma</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Respostas:</label>
                <ol>
                    <li class="mb-3">
                        <input type="text" class="form-control" name="resposta[]" required>
                        Correta <input type="radio" name="correta" value="0">
                    </li>
                    <li class="mb-3">
                        <input type="text" class="form-control" name="resposta[]" required>
                        Correta <input type="radio" name="correta" value="1">
                    </li>
                    <li class="mb-3">
                        <input type="text" class="form-control" name="resposta[]">
                        Correta <input type="radio" name="correta" value="2">
                    </li>
                    <li class="mb-3">
                        <input type="text" class="form-control" name="resposta[]">
                        Correta <input type="radio" name="correta" value="3">
                    </li>
                </ol>
            </div>
            <div class="mb-3">
                <label for="curiosidades" class="form-label">Curiosidade:</label>
                <textarea class="form-control" name="curiosidades" rows="4" cols="50" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Adicionar Pergunta</button>
        </form>

        <h2 class="mt-5">Listar Perguntas</h2>
        <a href="list_questions.php" class="btn btn-secondary">Ver Perguntas</a>

        <br>

        <a href="logout_admin.php" class="btn btn-danger mt-3">Sair</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
