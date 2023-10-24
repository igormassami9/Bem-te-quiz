<?php
session_start();

if (isset($_POST['reset'])) {
    $_SESSION['contador_corretas'] = 0;
    header("Location: quiz-zenFauna.php");
    exit();
}

if (isset($_POST['menu'])) {
    $_SESSION['contador_corretas'] = 0;
    header("Location: index.php");
    exit();
}

if (isset($_SESSION['contador_corretas'])) {
    $contadorCorretas = $_SESSION['contador_corretas'];
    $pontuacao = $contadorCorretas * 10; // Calcula a pontuação

    // Array de mensagens de incentivo com base no número de respostas corretas
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

    $mensagemIncentivo = isset($mensagensIncentivo[$contadorCorretas - 1]) ? $mensagensIncentivo[$contadorCorretas - 1] : "Bom trabalho!";
} else {
    $contadorCorretas = 0;
    $pontuacao = 0;
    $mensagemIncentivo = "Sem respostas corretas ainda. Continue tentando!";
}
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="Css/Style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<style>
    body {
        background-image: url('Css/BGLOGO.png');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .quadro {
    color: black;
    width: 801px;
    height: 435px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 20px;
    border: 2px solid #777;
    background: rgba(255, 255, 255, 0.88);
    box-shadow: 0px 8px 0px 0px #777, 4px 13px 4px 0px rgba(0, 0, 0, 0.25);
    z-index: -2;
    display: flex;
    justify-content: center;
    align-items: center;
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

    .tabela-acertos {
        position: relative;
        color: #404040;

        width: 210px;
        height: 164px;
        flex-shrink: 0;
        border-radius: 15px;
        background: #EFBA00;
        padding-top: 30%;
        left: -110%;
    }

    .texto-acertos {
        position: absolute;
        top: 5%;
        left: 34%;
    }

    .tabela-acertos2 {
        width: 187px;
        height: 117px;
        top: 21%;
        flex-shrink: 0;
        border-radius: 15px;
        background: #FFF;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
    }

    .container {
        position:relative;
        top: 10%;
        left: 38%;
    }

    .text-msg {
        top: 1%;
        position: relative;
    }
    
    .incentivo{
        position:relative;
        right:38% ;
    }

</style>


<body>
    <div class="rodape-resultado">
        <h1 class="texto-rodape">Resultado</h1>
    </div>

    <div class="rodape-placar">
        <p class="text-center fw-bold fs-2">Seu placar</p>
    </div>

   
    <div class="position-absolute top-50 start-50 translate-middle">
    
        <div class="quadro">
        
            <div class="container">
            <p>
        <div class="incentivo">
        <p class="text-msg fs-4 fw-bold"><?php echo $mensagemIncentivo; ?></p>
        </div>
        </p>
                <table>
                    <tr>
                        <td>
                            <div class="tabela-acertos fw-bold">
                                <p class="texto-acertos">Acertos</p>
                                <div
                                    class="tabela-acertos2 fw-bold fs-1 d-flex align-items-center justify-content-center">
                                    <p class="center">
                                        <?php echo $contadorCorretas; ?>/10
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="tabela-acertos fw-bold">
                                <p class="texto-acertos">Finalizado em</p>
                                <div
                                    class="tabela-acertos2 fw-bold fs-1 d-flex align-items-center justify-content-center">
                                    <p class="center">
                                        00:00
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="tabela-acertos fw-bold">
                                <p class="texto-acertos">Pontuação</p>
                                <div
                                    class="tabela-acertos2 fw-bold fs-1 d-flex align-items-center justify-content-center">
                                    <p class="center">
                                        <?php echo $pontuacao; ?>
                                    </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <form method="post">
        <button type="submit" name="reset" class="btn btn-primary">Tentar novamente</button>
        <button type="submit" name="menu" class="btn btn-secondary">Menu Principal</button>
    </form>

</body>

</html>