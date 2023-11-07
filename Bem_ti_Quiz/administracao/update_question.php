<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pergunta_id = $_POST['id_pergunta']; 
    $pergunta = $_POST['pergunta'];
    $categoria = $_POST['categoria'];
    $curiosidades = $_POST['curiosidades'];

    $updatePerguntaSql = "UPDATE perguntas SET pergunta = ?, id_categorias = ?, curiosidades = ? WHERE id = ?";
    $stmt = $conn->prepare($updatePerguntaSql);
    $stmt->bind_param("sssi", $pergunta, $categoria, $curiosidades, $pergunta_id);
    $stmt->execute();

    $deleteRespostasSql = "DELETE FROM respostas WHERE pergunta_id = ?";
    $stmt = $conn->prepare($deleteRespostasSql);
    $stmt->bind_param("i", $pergunta_id);
    $stmt->execute();

    foreach ($_POST['resposta'] as $key => $resposta) {
        $correta = ($key == $_POST['correta']) ? 1 : 0;
        $insertRespostaSql = "INSERT INTO respostas (resposta, pergunta_id, correta) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertRespostaSql);
        $stmt->bind_param("sii", $resposta, $pergunta_id, $correta);
        $stmt->execute();
    }
    
    sleep(1);

    header("Location: index_admin.php");
    exit; 
}

closeConnection($conn);
?>
