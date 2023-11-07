<?php
    include ('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pergunta = $_POST['pergunta'];
    $categoria = $_POST['categoria'];
    $curiosidades = $_POST['curiosidades'];

    $sql = "INSERT INTO perguntas (pergunta, id_categorias, curiosidades) VALUES ('$pergunta', '$categoria', '$curiosidades')";
    
    if ($conn->query($sql) === TRUE) {
        $pergunta_id = $conn->insert_id;

        foreach ($_POST['resposta'] as $key => $resposta) {
            $correta = ($key == $_POST['correta']) ? 1 : 0;
            $sql = "INSERT INTO respostas (resposta, pergunta_id, correta) VALUES ('$resposta', '$pergunta_id', '$correta')";
            
            if (!$conn->query($sql)) {
                echo "Erro ao adicionar respostas: " . $conn->error;
                break;
            }
        }

        echo "Pergunta adicionada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    closeConnection($conn);
}
?>
