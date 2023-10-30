<?php
include 'db_connection.php';

$conn = openConnection();

$sql = "SELECT * FROM perguntas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Pergunta: " . $row["pergunta"] . "<br>";
        echo "Categoria: " . $row["id_categorias"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Nenhuma pergunta encontrada.";
}

closeConnection($conn);
?>
