<?php
function connectToDatabase()
{
    $servername = "localhost";
    $username = "id21479018_admim24";
    $password = "Bemtequiz123@";
    $database = "id21479018_bemtequiz";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }

    return $conn;
}

function closeDatabaseConnection($conn)
{
    $conn->close();
}



function getQuestionsByCategory($categoryId)
{
    $conn = connectToDatabase();
    $sql = "SELECT id, pergunta, id_categorias FROM perguntas WHERE id_categorias = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();

    $result = $stmt->get_result();
    $questions = array();

    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }

    $stmt->close();
    closeDatabaseConnection($conn);

    return $questions;
}

function getRandomFaunaQuestionIds($count)
{
    $conn = connectToDatabase();

    $sql = "SELECT id FROM perguntas WHERE id_categorias = 1 ORDER BY RAND() LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $count);
    $stmt->execute();

    $result = $stmt->get_result();
    $questionIds = array();

    while ($row = $result->fetch_assoc()) {
        $questionIds[] = $row['id'];
    }

    $stmt->close();
    closeDatabaseConnection($conn);

    return $questionIds;
}

function getRandomFloraQuestionIds($count)
{
    $conn = connectToDatabase();

    $sql = "SELECT id FROM perguntas WHERE id_categorias = 2 ORDER BY RAND() LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $count);
    $stmt->execute();

    $result = $stmt->get_result();
    $questionIds = array();

    while ($row = $result->fetch_assoc()) {
        $questionIds[] = $row['id'];
    }

    $stmt->close();
    closeDatabaseConnection($conn);

    return $questionIds;
}

function getRandomHistoriaQuestionIds($count)
{
    $conn = connectToDatabase();

    $sql = "SELECT id FROM perguntas WHERE id_categorias = 3 ORDER BY RAND() LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $count);
    $stmt->execute();

    $result = $stmt->get_result();
    $questionIds = array();

    while ($row = $result->fetch_assoc()) {
        $questionIds[] = $row['id'];
    }

    $stmt->close();
    closeDatabaseConnection($conn);

    return $questionIds;
}

function getRandomBiomaQuestionIds($count)
{
    $conn = connectToDatabase();

    $sql = "SELECT id FROM perguntas WHERE id_categorias = 4 ORDER BY RAND() LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $count);
    $stmt->execute();

    $result = $stmt->get_result();
    $questionIds = array();

    while ($row = $result->fetch_assoc()) {
        $questionIds[] = $row['id'];
    }

    $stmt->close();
    closeDatabaseConnection($conn);

    return $questionIds;
}

function getAnswersByQuestionId($questionId)
{
    $conn = connectToDatabase();
    $sql = "SELECT id, resposta, correta FROM respostas WHERE pergunta_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $questionId);
    $stmt->execute();

    $result = $stmt->get_result();
    $answers = array();

    while ($row = $result->fetch_assoc()) {
        $answers[] = $row;
    }

    $stmt->close();
    closeDatabaseConnection($conn);

    return $answers;
}

function getQuestionById($questionId)
{
    $conn = connectToDatabase();
    $sql = "SELECT id, pergunta, id_categorias FROM perguntas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $questionId);
    $stmt->execute();

    $result = $stmt->get_result();
    $question = $result->fetch_assoc();

    $stmt->close();
    closeDatabaseConnection($conn);

    return $question;
}

function getCuriosidadeByQuestionId($questionId)
{
    $conn = connectToDatabase();
    $sql = "SELECT curiosidades FROM perguntas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $questionId);
    $stmt->execute();

    $result = $stmt->get_result();
    $curiosidade = $result->fetch_assoc();

    $stmt->close();
    closeDatabaseConnection($conn);

    if ($curiosidade) {
        return $curiosidade['curiosidades'];
    } else {
        return "Nenhuma curiosidade encontrada.";
    }
}


?>