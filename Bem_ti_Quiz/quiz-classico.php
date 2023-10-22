<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clássico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="Css/Style.css" rel="stylesheet" />
</head>

<body>
    <div class="rodape">
        <h1 class="texto-rodape">Clássico</h1>
    </div>

    <div class="container centered-container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bemtequiz";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        $sqlPerguntas = "SELECT id, pergunta FROM perguntas WHERE id_categorias = 1";
        $resultPerguntas = $conn->query($sqlPerguntas);

        if ($resultPerguntas->num_rows > 0) {
            $perguntaIds = [];

            while ($rowPergunta = $resultPerguntas->fetch_assoc()) {
                $perguntaIds[] = $rowPergunta["id"];
            }

            $resultPerguntas->close();
        } else {
            echo "Nenhuma pergunta encontrada para a categoria 'Fauna'.";
        }

        if (!empty($perguntaIds)) {
            $sqlRespostas = "SELECT id, resposta, correta FROM respostas WHERE pergunta_id = ?";
            $stmt = $conn->prepare($sqlRespostas);
            $stmt->bind_param("i", $perguntaId);

            echo "<div class='quadro-quiz'>";
            $perguntaNum = 1;
            foreach ($perguntaIds as $perguntaId) {
                $sqlPergunta = "SELECT pergunta FROM perguntas WHERE id = $perguntaId";
                $resultPergunta = $conn->query($sqlPergunta);
                if ($resultPergunta->num_rows > 0) {
                    $rowPergunta = $resultPergunta->fetch_assoc();
                }

                echo "<div class='pergunta' id='pergunta-" . $perguntaNum . "'>";
                echo "<p><strong>Pergunta " . $perguntaNum . ":</strong> " . $rowPergunta["pergunta"] . "</p>";
                echo "</div>";
                echo "<div class='respostas'>";

                $stmt->execute();
                $resultRespostas = $stmt->get_result();

                if ($resultRespostas->num_rows > 0) {
                    while ($rowResposta = $resultRespostas->fetch_assoc()) {
                        echo '<button class="btn btn-primary resposta" data-pergunta="pergunta-' . $perguntaNum . '" data-correta="' . $rowResposta["correta"] . '">' . $rowResposta["resposta"] . '</button>';
                    }
                } else {
                    echo "Nenhuma resposta encontrada.";
                }

                echo "</div>";
                $perguntaNum++;
            }
            $stmt->close();
            echo "</div>";
        }

        $conn->close();
        ?>
    </div>

    <script>
        const respostas = document.querySelectorAll('.resposta');
        let perguntaAtual = 1;

        respostas.forEach(resposta => {
            resposta.addEventListener('click', () => {
                const perguntaId = resposta.getAttribute('data-pergunta');
                const pergunta = document.getElementById(perguntaId);
                pergunta.style.display = 'none';

                const correta = resposta.getAttribute('data-correta');
                if (correta === "1") {
                    setTimeout(() => {
                        perguntaAtual++;
                        mostrarProximaPergunta();
                    }, 2000);
                } else {
                    perguntaAtual++;
                    mostrarProximaPergunta();
                }
            });
        });

        function mostrarProximaPergunta() {
            if (perguntaAtual <= <?php echo count($perguntaIds); ?>) {
                const proximaPergunta = document.getElementById('pergunta-' + perguntaAtual);
                if (proximaPergunta) {
                    proximaPergunta.style.display = 'block';
                }
            }
        }

        const primeiraPergunta = document.getElementById('pergunta-1');
        if (primeiraPergunta) {
            primeiraPergunta.style.display = 'block';
        }
    </script>
</body>

</html>