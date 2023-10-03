<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clássico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="Css/Style.css" rel="stylesheet" />
</head>

<body>
    <div class="rodape">
        <label classe="texto-rodape">Clássico</label>
    </div>

    <div class="container centered-container">
        <div class="quadro-quiz">
            <label class="texto-pergunta">
                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "bemtequiz";


                $conn = new mysqli($servername, $username, $password, $database);


                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }


                $sql = "SELECT pergunta FROM perguntas WHERE id = 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo "<p><strong>Pergunta:</strong> " . $row["pergunta"] . "</p>";
                    }
                } else {
                    echo "0 resultados";
                }


                $conn->close();
                ?>
            </label>
        </div>
    </div>
</body>

</html>