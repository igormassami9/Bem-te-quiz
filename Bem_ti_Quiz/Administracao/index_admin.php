<!DOCTYPE html>
<html>
<head>
    <title>CRUD BemTeQuiz</title>
</head>
<body>
    <h1>Gerenciar Perguntas, Respostas e Curiosidades</h1>
    <h2>Adicionar Pergunta</h2>
    <form action="add_question.php" method="post">
        Pergunta: <input type="text" name="pergunta" required><br>
        Categoria: 
        <select name="categoria" required>
            <option value="1">Fauna</option>
            <option value="2">Flora</option>
            <option value="3">História</option>
            <option value="4">Bioma</option>
        </select><br>
        Respostas:
        <ol>
            <li><input type="text" name="resposta[]" required> Correta <input type="radio" name="correta" value="0"></li>
            <li><input type="text" name="resposta[]" required> Correta <input type="radio" name="correta" value="1"></li>
            <li><input type="text" name="resposta[]"> Correta <input type="radio" name="correta" value="2"></li>
            <li><input type="text" name="resposta[]"> Correta <input type="radio" name="correta" value="3"></li>
        </ol>
        Curiosidade: <textarea name="curiosidades" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Adicionar Pergunta">
    </form>

    <h2>Listar Perguntas</h2>
    <a href="list_questions.php">Ver Perguntas</a>
    <br>

    <a href="Logout_admin.php">Sair</a>
</body>
</html>
