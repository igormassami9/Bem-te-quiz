<?php
include('db_functions.php');

session_start();

if (!isset($_SESSION['random_question_ids'])) {
    $_SESSION['random_question_ids'] = getRandomQuestionIds(10);
}

$randomQuestionIds = $_SESSION['random_question_ids'];

$questions = array();

foreach ($randomQuestionIds as $questionId) {
    $question = getQuestionById($questionId);
    if ($question) {
        $questions[] = $question;
    }
}

if (empty($questions)) {
    echo "Nenhuma pergunta encontrada.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modo Zen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="Css/Style.css" rel="stylesheet" />
    <style>
        body {
            background-image: url('Css/BGLOGO.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .respostas-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .resposta {
            flex: 1;
            margin: 5px;
            display: flex;
            width: 272px;
            height: 55px;
            flex-direction: column;
            justify-content: center;
            color: #303030;
            text-align: center;
            font-family: 'Be Vietnam Pro', sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            border-radius: 36px;
            background: #FFF;
            box-shadow: 0px 8px 0px 0px #CDCDCD, 5px 12px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .resposta:hover {
            background-color: #f0f0f0;
        }

        .resposta-correta {
            width: 252px;
            font-size: 20px;
            background: #91FF75;
            box-shadow: 0px 8px 0px 0px #91FF75, 5px 12px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .resposta-incorreta {
            width: 270px;
            font-size: 20px;
            background: #FF4B4B;
            box-shadow: 0px 5px 0px 0px #FF1717, 5px 5px 4px 0px rgba(0, 0, 0, 0.25);
        }

        #resultado-btn {
            display: none;
            flex: 1;
            margin: 5px;
            width: 272px;
            height: 55px;
            flex-direction: column;
            justify-content: center;
            color: #303030;
            text-align: center;
            font-family: 'Be Vietnam Pro', sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 600;
            border-radius: 36px;
            background: #FFF;
            box-shadow: 0px 8px 0px 0px #CDCDCD, 5px 12px 4px 0px rgba(0, 0, 0, 0.25);
            margin: 0 auto;
        }
    </style>

</head>

<body>
    <div class="rodape">
        <h1 class="texto-rodape">Modo Zen</h1>
    </div>

    <div class="container centered-container">
        <div id="quiz-container">
            <?php
            $perguntaNum = 1;
            foreach ($questions as $question) {
                echo "<div class='d-flex justify-content-center'>";
                echo "<div class='quadro-quiz justify-content-center'>";
                echo "<div class='pergunta' id='pergunta-" . $perguntaNum . "'>";
                echo "<p><strong>Pergunta " . $perguntaNum . ":</strong> " . $question['pergunta'] . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $respostas = getAnswersByQuestionId($question['id']);
                echo "<div class='respostas-container'>";
                if (!empty($respostas)) {
                    foreach ($respostas as $resposta) {
                        echo '<button class="btn resposta" data-correta="' . $resposta["correta"] . '">' . $resposta["resposta"] . '</button>';
                    }
                } else {
                    echo "<div class='sem-respostas'>Nenhuma resposta encontrada.</div>";
                }
                echo "</div>";
                echo "<br>";
                $perguntaNum++;
            }
            ?>
        </div>
        <button id="resultado-btn" class="btn" onclick="redirectToPlacar()">Ver Placar</button>
        <br>
    </div>

    <script>
        const resultadoBtn = document.getElementById('resultado-btn');
        const respostas = document.querySelectorAll('.resposta');
        const perguntasTotais = <?php echo count($questions); ?>;
        let perguntasRespondidas = 0;

        respostas.forEach(resposta => {
            resposta.addEventListener('click', () => {
                const correta = resposta.getAttribute('data-correta');
                if (correta === "1") {
                    resposta.classList.add('resposta-correta');
                } else {
                    resposta.classList.add('resposta-incorreta');
                }
                resposta.style.pointerEvents = 'none';
                perguntasRespondidas++;

                if (perguntasRespondidas === perguntasTotais) {
                    resultadoBtn.style.display = 'block';
                }
            });
        });

        function redirectToPlacar() {
            window.location.href = 'Placar.php';
        }
    </script>

</body>

</html>