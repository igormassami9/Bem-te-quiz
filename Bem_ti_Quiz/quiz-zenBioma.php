<?php
include('db_functions.php');

session_start();

if (!isset($_SESSION['random_question_ids'])) {
    $_SESSION['random_question_ids'] = getRandomBiomaQuestionIds(10);
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

$currentQuestionIndex = isset($_GET['q']) ? (int) $_GET['q'] : 0;
$totalQuestions = count($questions);

if ($currentQuestionIndex >= $totalQuestions) {
    header("Location: Placar.php");
    exit();
}

$currentQuestion = $questions[$currentQuestionIndex];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modo Zen - Pergunta
        <?php echo $currentQuestionIndex + 1; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="Css/Style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500&display=swap" rel="stylesheet">
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
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 1px;
            align-items: center;
        }

        .resposta,
        .resposta-correta,
        .resposta-incorreta {
            flex: 1;
            margin: 10px;
            min-width: 0;
            width: 100%;
            height: 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #303030;
            text-align: center;
            font-family: 'Be Vietnam Pro', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            border-radius: 36px;
            background: #FFF;
            box-shadow: 0px 8px 0px 0px #CDCDCD, 5px 12px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .btn-seg {
            flex: 1;
            margin: 5px;
            min-width: 0;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #303030;
            text-align: center;
            font-family: 'Be Vietnam Pro', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            border-radius: 36px;
            background: #FFF;
            box-shadow: 0px 8px 0px 0px #CDCDCD, 5px 12px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .resposta:hover,
        .btn-seg:hover {
            background-color: #f0f0f0;
        }

        .resposta-correta {
            flex: 1;
            margin: 10px;
            min-width: 0;
            width: 100%;
            height: 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #303030;
            text-align: center;
            font-family: 'Be Vietnam Pro', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            border-radius: 36px;
            background: #91FF75;
            box-shadow: 0px 8px 0px 0px #91FF75, 5px 12px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .resposta-incorreta {
            flex: 1;
            margin: 10px;
            min-width: 0;
            width: 100%;
            height: 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #FFF;
            text-align: center;
            font-family: 'Be Vietnam Pro', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            border-radius: 36px;
            background: #FF4B4B;
            box-shadow: 0px 5px 0px 0px #FF1717, 5px 5px 4px 0px rgba(0, 0, 0, 0.25);
        }

        #button-container {
            position: absolute;
            top: 10px;
            right: 10px;
        }


        #proximo-btn {
            color: #303030;
            background: #FFF;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }


        #proximo-btn:disabled {
            background: #f0f0f0;
        }
    </style>
</head>

<body>
    <div class="rodape">
        <h1 class="texto-rodape">Modo Zen</h1>
    </div>

    <div class="container centered-container">
        <div id="quiz-container">
            <div class='d-flex justify-content-center'>
                <div class='quadro-quiz justify-content-center'>
                    <div class='texto-pergunta'>
                        <p><strong>Pergunta
                                <?php echo $currentQuestionIndex + 1; ?>
                            </strong><br>
                            <?php echo $currentQuestion['pergunta']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class='respostas-container'>
                <div class="row row-cols-2">
                    <?php
                    $respostas = getAnswersByQuestionId($currentQuestion['id']);
                    if (!empty($respostas)) {
                        foreach ($respostas as $resposta) {
                            echo '<div class="col">';
                            echo '<button class="btn resposta" data-correta="' . $resposta["correta"] . '">' . $resposta["resposta"] . '</button>';
                            echo '</div>';
                        }
                    } else {
                        echo "<div class='col'>Nenhuma resposta encontrada.</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="button-container" class="text-right">
            <button id="proximo-btn" class="btn btn-seg" onclick="proximaPergunta()">Próxima Pergunta</button>
            <button id="resultado-btn" class="btn btn-seg" onclick="redirectToPlacar()">Ver Placar</button>
        </div>
    </div>

    <script>
        const proximoBtn = document.getElementById('proximo-btn');
        const resultadoBtn = document.getElementById('resultado-btn');
        const respostas = document.querySelectorAll('.resposta');
        let perguntasRespondidas = 0;
        const perguntasTotais = <?php echo count($questions); ?>;
        let perguntaAtual = <?php echo $currentQuestionIndex; ?>;
        let respostaSelecionada = false;

        proximoBtn.disabled = true;

        respostas.forEach(resposta => {
            resposta.addEventListener('click', () => {
                if (!respostaSelecionada) {
                    const correta = resposta.getAttribute('data-correta');
                    if (correta === "1") {
                        resposta.classList.add('resposta-correta');
                    } else {
                        resposta.classList.add('resposta-incorreta');
                    }
                    resposta.style.pointerEvents = 'none';
                    perguntasRespondidas++;
                    respostaSelecionada = true;

                    proximoBtn.disabled = false;
                }
            });
        });

        function proximaPergunta() {
            perguntaAtual++;
            atualizarBotoes();
            if (perguntaAtual < perguntasTotais) {
                window.location.href = `quiz-zenBioma.php?q=${perguntaAtual}`;
            }
        }

        function redirectToPlacar() {
            window.location.href = 'Placar.php';
        }

        function atualizarBotoes() {
            if (perguntaAtual < perguntasTotais - 1) {
                proximoBtn.disabled = true;
                resultadoBtn.style.display = 'none';
            } else {
                proximoBtn.style.display = 'none';
                resultadoBtn.style.display = 'block';
            }
        }

        atualizarBotoes();
    </script>
</body>

</html>