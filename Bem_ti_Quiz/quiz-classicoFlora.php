<?php
include('db_functions.php');
require_once('verificacao.php'); 

if (!verificarLogin()) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['sair'])) {
    unset($_SESSION['random_question_ids']);
    header("Location: home.php");
    exit();
}

if (!isset($_SESSION['random_question_ids'])) {
    $_SESSION['random_question_ids'] = getRandomFloraQuestionIds(10);
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
    echo "O jogo está com problemas técnicos no momento. Por favor, tente novamente mais tarde.";
    exit();
}

$currentQuestionIndex = isset($_GET['q']) ? (int) $_GET['q'] : 0;
$totalQuestions = count($questions);

if ($currentQuestionIndex >= $totalQuestions) {
    header("Location: Placar-classico.php");
    exit();
}

$currentQuestion = $questions[$currentQuestionIndex];
$curiosidade = getCuriosidadeByQuestionId($currentQuestion['id']);

$imagensAleatorias = array(
    'css/Curiosidade_01.jpg',
    'css/Curiosidade_02.jpg',
    'css/Curiosidade_03.jpg'
);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modo Clássico - Pergunta
        <?php echo $currentQuestionIndex + 1; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('css/BGLOGO.png');
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
            box-shadow: 0px 8px 0px 0px #407334, 5px 12px 4px 0px rgba(0, 0, 0, 0.25);
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

        #curiosidade-alert {
            font-family: 'Be Vietnam Pro';
            font-size: 20px;
            font-weight: bold;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            z-index: 1000;
            display: none;
            border-radius: 20px;
            background: #91FF75;
            box-shadow: 8px 8px 4px 564px rgba(0, 0, 0, 0.50), 0px 8px 4px 0px #6CBD58;
        }

        .quadro {
            width: 400px;
            height: 60px;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 20px;
            background: #FFF;
            box-shadow: 0px 8px 0px 0px #CDCDCD;
        }

        .inside {
            background: #FFBD12;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 20px;
            color: #FFF;
            text-align: center;
            font-family: Be Vietnam Pro;
            font-size: 40px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .seta {
            font-size: 20px;
            cursor: pointer;
        }

        .contador {
            font-size: 16px;
            margin-right: 20px;
        }

        .cronometro {
            font-size: 16px;
        }
        
        .close-button:hover {
         background-color: #f0f0f0;
        }

        .close-button {
            border: 0px;
            flex: 1;
            margin: 5px;
            min-width: 0;
            height: auto;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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

        #imagem-aleatoria {
            max-width: 300px;
            max-height: 200px;
            border-radius: 10%;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            margin: 10px auto;
            display: block;
        }

        #tempo-esgotado-alert {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            background-color: #FF4B4B;
            color: #FFF;
            border-radius: 10px;
            font-family: 'Be Vietnam Pro', sans-serif;
            font-size: 20px;
            font-weight: bold;
            z-index: 1000;
            box-shadow: 0px 8px 0px 0px #FF1717, 8px 8px 4px 1000px rgba(0, 0, 0, 0.50);
        }


        #tempo-esgotado-alert img {
            max-width: 300px;
            max-height: 200px;
        }

        #fechar-alert {
            border: 0px;
            flex: 1;
            margin: 5px;
            min-width: 0;
            height: auto;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
    </style>
</head>

<body>
    <div id="overlay"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: none; z-index: 999;">
    </div>

    <div class="rodape">
        <h1 class="texto-rodape">Modo Clássico</h1>
    </div>

    <div class="position-absolute top-0 start-50 translate-middle-x">
        <div class="quadro">
            <div class="inside" id="inside">
                <div class="seta" onclick="confirmarVolta()">&#8592;</div>
            </div>
            <div class="inside" id="inside">
                <div class="contador" id="contador">
                    <?php echo $currentQuestionIndex + 1; ?>/10
                </div>
            </div>
            <div class="inside" id="inside">
                <div class="cronometro" id="cronometro"> Tempo Restante:<span id="tempo-restante">20 segundos</span>
                </div>
            </div>
        </div>
    </div <div class="container centered-container">
    <div id="quiz-container">
        <div class='d-flex justify-content-center'>
            <div class='quadro-quiz justify-content-center'>
                <div class='texto-pergunta'>
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

    <div id="curiosidade-alert" class="alert alert-info" role="alert">
        <p id="curiosidade-text">
            <?php echo $curiosidade; ?>
        </p>
        <img id="imagem-aleatoria" src="" alt="Imagem Aleatória">
        <br>
        <button id="close-button" class="close-button" onclick="fecharAlerta()">Fechar</button>
    </div>

    <audio id="som-acerto">
        <source src="css/correct.mp3" type="audio/mpeg">
    </audio>

    <audio id="som-erro">
        <source src="css/incorrect.mp3" type="audio/mpeg">
    </audio>
    
    <audio id="backgroundAudio" loop volume="0.1">
    <source src="css/quiz_loop_theme.mp3" type="audio/mpeg">
    </audio>

    <div id="tempo-esgotado-alert" class="alert alert-danger" role="alert" style="display: none;">
        <p>Tempo Esgotado!</p>
        <img src="css/tempo_esgotado.gif" alt="Tempo Esgotado GIF">
        <br>
        <button id="fechar-alert">Fechar</button>
    </div>


    <script>
    const proximoBtn = document.getElementById('proximo-btn');
    const resultadoBtn = document.getElementById('resultado-btn');
    const respostas = document.querySelectorAll('.resposta');
    let perguntasRespondidas = 0;
    let perguntasCorretas = 0;
    let perguntasErradas = 0;
    const perguntasTotais = <?php echo count($questions); ?>;
    let perguntaAtual = <?php echo $currentQuestionIndex; ?>;
    let respostaSelecionada = false;
    let tempoRestante = 20;
    let tempoEsgotadoAlert = document.getElementById("tempo-esgotado-alert");
    let tempoRestanteSpan = document.getElementById("tempo-restante");
    let intervalCronometro;
    const backgroundAudio = document.getElementById('backgroundAudio');
    const audioTime = localStorage.getItem('audioTime');

    if (audioTime) {
        backgroundAudio.currentTime = parseFloat(audioTime);
    }

    backgroundAudio.play();

    setInterval(function () {
        localStorage.setItem('audioTime', backgroundAudio.currentTime);
    }, 1000);

    proximoBtn.disabled = true;

    function exibirTempoEsgotadoAlert() {
        tempoEsgotadoAlert.style.display = "block";
        tempoEsgotadoAlert.classList.add("animate__animated", "animate__flash");
        respostas.forEach(resposta => {
            resposta.style.pointerEvents = 'none';
            const correta = resposta.getAttribute('data-correta');
            if (correta === "1") {
                resposta.classList.add('resposta-incorreta');
            }
        });
        proximoBtn.disabled = false;
    }

    const fecharAlertButton = document.getElementById("fechar-alert");
    fecharAlertButton.addEventListener('click', () => {
        tempoEsgotadoAlert.style.display = "none";
    });

    function iniciarCronometro() {
        tempoRestante = 20;
        clearInterval(intervalCronometro);
        atualizarTempoRestante();
        intervalCronometro = setInterval(() => {
            tempoRestante--;
            atualizarTempoRestante();
            if (tempoRestante === 0) {
                clearInterval(intervalCronometro);
                exibirTempoEsgotadoAlert();
            }
        }, 1000);
    }

    function atualizarTempoRestante() {
        const minutos = Math.floor(tempoRestante / 60);
        const segundos = tempoRestante % 60;
        const tempoFormatado = `${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
        tempoRestanteSpan.textContent = tempoFormatado;
    }

    respostas.forEach(resposta => {
        resposta.addEventListener('click', () => {
            verificarResposta(resposta);
        });
    });

    function verificarResposta(resposta) {
        if (!respostaSelecionada) {
            const correta = resposta.getAttribute('data-correta');
            clearInterval(intervalCronometro);

            if (correta === "1") {
                resposta.classList.add('resposta-correta');
                perguntasCorretas++;
                const somAcerto = document.getElementById('som-acerto');
                somAcerto.play();
                const curiosidadeAlert = document.getElementById('curiosidade-alert');
                curiosidadeAlert.style.display = 'block';
                incrementarContadorCorretas();
                var overlay = document.getElementById("overlay");
                overlay.style.display = 'block';
            } else {
                resposta.classList.add('resposta-incorreta');
                const somErro = document.getElementById('som-erro');
                somErro.play();
                incrementarContadorErradas(); 
            }

            resposta.style.pointerEvents = 'none';
            respostaSelecionada = true;
            proximoBtn.disabled = false;
            perguntasRespondidas++;
        }
    }

    function incrementarContadorErradas() {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'atualizar_contador.php', true); 
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
            }
        };
        xhr.send('incrementar_erradas=1');
    }

    function escolherImagemAleatoria() {
        const indiceAleatorio = Math.floor(Math.random() * <?php echo count($imagensAleatorias); ?>);
        const imagemAleatoria = <?php echo json_encode($imagensAleatorias); ?>[indiceAleatorio];
        return imagemAleatoria;
    }

    function atualizarImagemAleatoria() {
        const imagemAleatoria = escolherImagemAleatoria();
        const imagemElement = document.getElementById('imagem-aleatoria');
        imagemElement.src = imagemAleatoria;
    }

    atualizarImagemAleatoria();

    function fecharAlerta() {
        var alertDiv = document.getElementById("curiosidade-alert");
        alertDiv.style.display = "none";
        var overlay = document.getElementById("overlay");
        overlay.style.display = "none";
    }

    function incrementarContadorCorretas() {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'atualizar_contador.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
            }
        };
        xhr.send('incrementar=1');
    }

    function proximaPergunta() {
        perguntaAtual++;
        iniciarCronometro();
        atualizarBotoes();
        if (perguntaAtual < perguntasTotais) {
            window.location.href = `quiz-classicoFlora.php?q=${perguntaAtual}`;
        }
    }

    function redirectToPlacar() {
        window.location.href = 'placar-classico.php';
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

    function confirmarVolta() {
        const confirmar = confirm("Deseja voltar ao menu principal?");
        if (confirmar) {
            <?php unset($_SESSION['random_question_ids']); ?>
            window.location.href = "home.php";
        }
    }

    iniciarCronometro();

    </script>
</body>

</html>