<?php
require_once('verificacao.php');

if (!verificarLogin()) {
    header("Location: login.php");
    exit();
}

include 'conexao.php';

$conn = include 'conexao.php';

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$tempo = isset($_GET['tempo']) ? $_GET['tempo'] : '00:00';

if (isset($_POST['menu'])) {
    $_SESSION['contador_corretas'] = 0;
    $_SESSION['contador_erradas'] = 0;
    header("Location: home.php");
    exit();
}

$contadorCorretas = isset($_SESSION['contador_corretas']) ? $_SESSION['contador_corretas'] : 0;
$contadorErradas = isset($_SESSION['contador_erradas']) ? $_SESSION['contador_erradas'] : 0;

$pontuacao_partida_atual = ($contadorCorretas * 10) - ($contadorErradas * 5);

$mensagensIncentivo = [
    "Oh, você acertou uma pergunta! Vamos melhorar!",
    "Duas respostas certas! Está indo bem!",
    "Você acertou 3 perguntas. Continue assim!",
    "Impressionante! 4 acertos. Você está indo muito bem!",
    "Cinco acertos! Você está no caminho certo!",
    "Seis respostas corretas! Está ficando ótimo!",
    "Uau! Você acertou 7 perguntas corretamente! Continue assim!",
    "Oito respostas certas. Você é um mestre nisso!",
    "Nove acertos! Você está quase perfeito!",
    "Incrível! 10 de 10! Você é um gênio!"
];

$mensagemIncentivo = $mensagensIncentivo[min($contadorCorretas - 1, 9)] ?? "Bom trabalho!";

if ($user_id !== null) {
    $modo_jogo = "Tempo";  

    $sql = "SELECT pontuacao, tempo FROM pontuacoes_tempo WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pontuacao_anterior = $row['pontuacao'];
        $tempo_anterior = $row['tempo'];

        if ($pontuacao_partida_atual > $pontuacao_anterior && $tempo < $tempo_anterior) {
            $sql = "UPDATE pontuacoes_tempo SET pontuacao = ?, tempo = ? WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $pontuacao_partida_atual, $tempo, $user_id);
            $stmt->execute();
        }
    } else {
        $sql = "INSERT INTO pontuacoes_tempo (user_id, pontuacao, tempo, modo_jogo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $user_id, $pontuacao_partida_atual, $tempo, $modo_jogo);
        $stmt->execute();
    }

    if ($stmt->affected_rows > 0) {
        // Pontuação e tempo inseridos ou atualizados com sucesso
    } else {
        echo "Erro ao salvar a pontuação e o tempo: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Erro: user_id não definido na sessão.";
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<style>
    body {
        background-image: url('css/BGLOGO.png');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .rodape-resultado {
        position: absolute;
        width: 244px;
        height: 60px;
        flex-shrink: 0;
        top: 0;
        left: 0;
        border-radius: 0px 0px 20px 0px;
        background: #FFF;
        box-shadow: 0px 8px 0px 0px #CDCDCD;
    }

    .container-placar {
        width: 100%;
        max-width: 800px;
        height: 400px;
        width: 700px;
        background: rgba(255, 255, 255, 0.88);
        border: 2px solid #777;
        border-radius: 20px;
        box-shadow: 0 8px 0 0 #777, 4px 13px 4px 0 rgba(0, 0, 0, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        margin: 10px;
    }

    .rodape-placar {
        width: 210px;
        height: 63.689px;
        flex-shrink: 0;
        border-radius: 10px;
        background: #87FF69;
        box-shadow: 0px 8px 0px 0px #72D959;
        position: absolute;
        top: 15%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 10px 20px;
        text-align: center;
        font-weight: bold;
        font-size: 20px;
        z-index: 2;
    }

    .incentivo {
        margin-top: 20%;
        font-size: 25px;
    }

    .text-msg {
        text-align: center;
        margin-left: 40px;
    }

    .quadrado {
        color: #404040;
        border: 0px solid #000;
        padding: 5px;
        margin: 5px;
        width: 150px;
        text-align: center;
        display: inline-block;
        margin-top: 50%;
        border-radius: 15px;
        background: #EFBA00;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .informacao {
        color: #404040;
        background-color: #f0f0f0;
        border: 0px solid #888;
        padding-top: 20%;
        padding-bottom: 20%;
        margin-top: 5%;
        border-radius: 15px;
        background: #fff;
        font-family: 'Be Vietnam Pro', sans-serif;
        font-size: 20px;
    }

    .botao-voltar {
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        border: none;
        padding: 5px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-family: "Be Vietnam Pro", sans-serif;
        font-weight: bold;
        font-style: italic;
        text-align: center;
        font-size: 20px;
        width: 200px;
        height: 37px;
        position: absolute;
        bottom: 14px;
        left: 50%;
        transform: translateX(-50%);
        box-shadow: 0px 8px 0px #CDCDCD;
        border-radius: 30px;
    }
</style>

<body>
    <audio id="som-aparecer" autoplay style="display: none;">
        <source src="css/concluido.mp3" type="audio/mpeg">
    </audio>

    <div class="rodape-resultado">
        <h1 class="texto-rodape">Resultado</h1>
    </div>

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="container container-placar">
            <div class="position-absolute top-0 start-50 translate-middle-x">
                <div class="rodape-placar">
                    <p class="text-center fw-bold fs-2">Seu placar</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="position-absolute top-0 start-50 translate-middle-x">
                        <div class="incentivo text-center">
                            <p class="text-msg  fw-bold">
                                <?php echo $mensagemIncentivo; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4">
                    <div class="quadrado fw-bold">
                        <p>Acertos</p>
                        <div class="informacao fw-bold">
                            <p>
                                <?php echo $contadorCorretas; ?>/10
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="quadrado fw-bold">
                        <p>Tempo Restante</p>
                        <div class="informacao fw-bold">
                            <p>
                                <?php echo $tempo; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4">
                    <div class="quadrado fw-bold">
                        <p>Pontuação</p>
                        <div class="informacao fw-bold">
                            <p>
                                <?php echo $pontuacao_partida_atual; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="post">
        <button class="botao-voltar" type="submit" name="menu" class="btn btn-secondary">Voltar ao Menu</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        window.addEventListener('load', function () {
            var somAparecer = document.getElementById('som-aparecer');
            somAparecer.play();
        });
    </script>
</body>

</html>